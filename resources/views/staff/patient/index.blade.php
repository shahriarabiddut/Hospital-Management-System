@extends('staff/layout')
@section('title', 'Patient')

@section('content')


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Patients</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Patient Data
            <a href="{{ route('staff.patient.create') }}" class="float-right btn btn-success btn-sm" target="_blank">Add New </a> </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($data)
                        @foreach ($data as $key=> $d)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td><img width="100"
                                class=""
                                src="{{$d->photo ? asset('storage/'.$d->photo) : url('images/user.png')}}"
                                alt=""
                            /></td>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->mobile }}</td>
                            
                            
                            <td class="text-center">
                                <a href="{{ url('staff/patient/'.$d->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="{{ url('staff/patient/'.$d->id.'/edit') }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Are You Sure?')" href="{{ url('staff/patient/'.$d->id.'/delete') }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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

