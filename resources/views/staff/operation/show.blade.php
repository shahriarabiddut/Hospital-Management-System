@extends('staff/layout')
@section('title', 'Operation Details')
@section('content')


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Operation Details
            <a href="{{ route('staff.operation.index') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left mx-1"></i> View All </a>       
            @if ($data->bill->status==1)
            <button onClick="printdiv('printable_div_id');" class="float-right btn btn-success btn-sm mx-1"><i class="fa fa-print"> Print </i></button>
            @else
            <a href="{{ route('staff.operation.bill',$data->id) }}" class="float-right btn btn-success btn-sm mx-1"><i class="fa fa-check"> Pay </i></a> 
            @endif
        </h3>
        </div>
        <div class="card-body">
            
            <div class="table-responsive" id='printable_div_id'>
                <table class="table table-bordered" width="100%">
                    <tr>
                    <th>Operation Name </th>
                    <td><h3>{{ $data->operation->title }}</h3></td>
                    </tr>
                    <tr>
                    <th>Patient Name </th>
                    <td>{{ $data->patient->name }}</td>
                    </tr>
                    <tr>
                        <th>Doctor </th>
                        <td>{{ $data->doctor->name }}</td>
                        </tr>
                    <tr>
                    <tr>
                        <th>Date </th>
                        <td>{{ $data->date}}</td>
                    </tr>
                    <tr>
                        <th>Operation Theatre Type </th>
                        <td>
                            @switch($data->ot_type)
                                @case(1)
                                    Single theatre, containing one operating table.
                                    @break
                                @case(2)
                                    Double theatre, containing two operating tables.
                                    @break
                                @default
                                    N/A
                            @endswitch
                        </td>
                    </tr>
                    <tr>
                        <th> Instructions </th>
                        <td>{{ $data->instruction}}</td>
                    </tr>
                    <tr>
                        <th> Descriptions </th>
                        <td>{{ $data->description}}</td>
                    </tr>
                    <tr>
                        <th>Bill Status </th>
                        @if ($data->bill->status==0)
                        <td class="bg-danger text-white"> Due
                        @else
                        <td class="bg-success text-white"> Paid
                        @endif
                    </tr>
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

