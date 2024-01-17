@extends('staff/layout')
@section('title', 'Lab Test Details')
@section('content')


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Lab Test Details
            <a href="{{ route('staff.labtest.index') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left mx-1"></i> View All </a>       
            @if ($data->bill->status==1)
            <button onClick="printdiv('printable_div_id');" class="float-right btn btn-success btn-sm mx-1"><i class="fa fa-print"> Print </i></button>
            @else
            <a href="{{ route('staff.labtest.bill',$data->id) }}" class="float-right btn btn-success btn-sm mx-1"><i class="fa fa-check"> Pay </i></a> 
            @endif
        </h3>
        </div>
        <div class="card-body">
            
            <div class="table-responsive" id='printable_div_id'>
                <table class="table table-bordered" width="100%">
                    <th>Test Name </th>
                        <td><h3>{{ $data->test->name }}</h3></td>
                    </tr>
                    <tr>
                    <th>Patient Name </th>
                        <td>{{ $data->patient->name }}</td>
                    </tr>
                    <tr>
                        <th>Technician </th>
                            <td>{{ $data->technician->name }}</td>
                        </tr>
                    <tr>
                    <tr>
                        <th>Date </th>
                            <td>{{ $data->date}}</td>
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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Lab Test Results
            <a href="{{ route('staff.labtest.index') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left mx-1"></i> View All </a>       
            @if ($data->bill->status==1)
            <button onClick="printdiv('printable_div');" class="float-right btn btn-success btn-sm mx-1"><i class="fa fa-print"> Print Result </i></button>
            @endif
        </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive" id='printable_div'>
                <h3 class="m-0 font-weight-bold text-primary m-1">{{ $data->test->name }} </h3>
                <table class="table table-bordered" width="100%">
                    <thead>
                        <th>Test Name</th>
                        <th>Range Data</th>
                    </thead>
                    @php $string = 'test';$res = 'result';$nor = 'normalrange' @endphp
                    <tbody>
                        @for ($i=1;$i<=$totalTest;$i++)
                        @php $temp = $string.$i;$result = $res.$i;$normalrange = $nor.$i @endphp
                        <tr>
                            <th>{{ $data->test->$temp }}</th>
                            <td>{{ $data->$result }} / {{ $data->test->$normalrange }}</td>
                        </tr>
                        @endfor
                </table>
            </div>
            
        </div>
    </div>


    @section('scripts')
    <script>
        function printdiv(elem) {
          var header_str = '<html><head><title>' + document.title  + '</title></head><body>';
          var footer_str = '</body></html>';
          var new_str = document.getElementById(elem).innerHTML;
          var old_str = document.body.innerHTML;
          document.body.innerHTML = header_str + new_str + footer_str;
          window.print();
          document.body.innerHTML = old_str;
          return false;
        }
        </script>
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endsection
@endsection

