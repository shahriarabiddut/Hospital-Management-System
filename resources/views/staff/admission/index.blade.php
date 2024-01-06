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
                            <th>Doctor</th>
                            <th>Nurse</th>
                            <th>Check In Date</th>
                            <th>Check Out Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Nurse</th>
                            <th>Check In Date</th>
                            <th>Check Out Date</th>
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
                            <td>{{ $d->doctor->name }}</td>
                            <td>{{ $d->nurse->name }}</td>
                            <td>{{ $d->check_in }}</td>
                            <td>{{ $d->check_out }} @if ($d->status==0)<a href="{{ route('staff.admission.edit',$d->id) }}" class="btn btn-warning btn-sm mx-1"><i class="fa fa-pen"></i> Update </a>@endif</td>
                            
                            <td class="text-center">
                                <a href="{{ route('staff.admission.show',$d->id) }}" class="btn btn-info btn-sm"><i class="fa fa-print"></i> View </a>
                                
                                <a onclick="return confirm('Are You Sure?')" href="{{ route('staff.admission.delete',$d->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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

