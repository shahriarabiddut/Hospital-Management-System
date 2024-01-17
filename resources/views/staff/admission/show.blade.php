@extends('staff/layout')
@section('title', 'Admission Details')
@section('content')


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Admission Details
            <a href="{{ route('staff.admission.index') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left mx-1"></i> View All </a>  
            @if ($data->bill!=null)     
            @if ($data->bill->status==1)
            <button onClick="printdiv('printable_div_id');" class="float-right btn btn-success btn-sm mx-1"><i class="fa fa-print"> Print </i></button>
            @else
            <a href="{{ route('staff.admission.bill',$data->id) }}" class="float-right btn btn-success btn-sm mx-1"><i class="fa fa-check"> Pay </i></a> 
            @endif
            @endif
        </h3>
        </div>
        <div class="card-body">
            
            <div class="table-responsive" id='printable_div_id'>
                <table class="table table-bordered" width="100%">
                    <tfoot>
                        <tr>
                            <th> Add Operation For This Patient </th>
                            <th><a href="{{ route('staff.operation.create1',$data->id) }}" class="float-right btn btn-success btn-sm" target="_blank">Add Operation</a></th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <th>Patient Name </th>
                    <td>{{ $data->patient->name }}</td>
                    </tr>
                    <tr>
                        <th>Doctor </th>
                        <td>{{ $data->doctor->name }}</td>
                    </tr>
                    <tr>
                        <th>Nurse </th>
                        <td>{{ $data->nurse->name }}</td>
                    </tr>
                    <tr>
                        <th>Check in Date </th>
                        <td>{{ $data->check_in}}</td>
                    </tr>
                    <tr>
                        <th>Check Out </th>
                        @if ($data->status==0)
                        <td class="bg-success text-white"> {{ $data->check_out}} - <a href="{{ route('staff.admission.checkout',$data->id) }}" class="btn btn-warning btn-sm mx-1"><i class="fa fa-pen"></i> Check Out </a>
                        @else
                        <td class="bg-danger text-white"> Checked Out On {{ $data->check_out}}
                        @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Room No </th>
                        <td>{{ $data->room->title}}</td>
                    </tr>
                    <tr>
                        <th>Seat </th>
                        <td>{{ $data->seat}} seats</td>
                    </tr>
                    <tr>
                        <th>Room Type </th>
                        <td>{{ $data->room_type->title}}</td>
                    </tr>
                    @if ($data->bill!=null)
                    <tr>
                        <th>Bill Status </th>
                        @if ($data->bill->status==0)
                        <td class="bg-danger text-white"> Due
                        @else
                        <td class="bg-success text-white"> Paid
                        @endif
                    </tr>
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

