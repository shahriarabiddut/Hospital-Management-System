@extends('staff/layout')
@section('title', 'Admissions')
@section('content')

            <!-- Session Messages Starts -->
            @if(Session::has('success'))
            <div class="p-3 mb-2 bg-success text-white">
                <p>{{ session('success') }} </p>
            </div>
            @endif
            @if(Session::has('danger'))
            <div class="p-3 mb-2 bg-danger text-white">
                <p>{{ session('danger') }} </p>
            </div>
            @endif
            <!-- Session Messages Ends -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Admissions Data
            <a href="{{ route('staff.admission.create') }}" class="float-right btn btn-success btn-sm" target="_blank">Add New</a> </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Patient</th>
                            <th>Visited Today</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Patient</th>
                            <th>Visited Today</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($data)
                        @foreach ($data as $key => $d)
                        <tr>
                            <td>{{ ++$key }}</td>
                            @if ($d->status==0)
                            <td class="bg-success text-white"> {{ $d->patient->name }} - ( {{ $d->patient->mobile }})</td>
                            @else
                            <td class="bg-warning text-white"> {{ $d->patient->name }} - ( {{ $d->patient->mobile }})</td>
                            @endif
                            @php
                                $visit = 0;
                            //checking if its today
                            $currentDate = Carbon\Carbon::now(); // get current date and time
                            $current_time = $currentDate->setTimezone('GMT+6')->format('Y-m-d'); // 2023-03-17
                                foreach ($d->visit as $visitD) {
                                    $dateString = $visitD->created_at;
                                    $dateTime = new DateTime($dateString);
                                    $newFormat = $dateTime->format("Y-m-d");
                                    if ($current_time == $newFormat) {
                                        $visit = 1;
                                    }
                                }
                            @endphp
                            @if ($visit==0)
                            <td class="bg-warning text-white"> Not Visited Today <a href="{{ route('staff.admissionvisits.create',$d->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Visit </a>
                            @else
                            <td class="bg-info text-white"> Visited
                            @endif
                            {{ $newFormat }}
                            {{ $current_time }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('staff.admissionvisit.show',$d->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> View </a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @section('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endsection
@endsection

