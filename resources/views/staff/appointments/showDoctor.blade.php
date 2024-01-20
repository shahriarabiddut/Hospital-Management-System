@extends('staff/layout')
@section('title', 'Appointment Details')
@section('content')


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Appointment Details
            <a href="{{ route('staff.appointments.index') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left mx-1"></i> View All </a>
        </h3>
        </div>
        <div class="card-body">
            
            <div class="table-responsive" id='printable_div_id'>
                <table class="table table-bordered" width="100%">
                    <tr>
                    <th>Full Name </th>
                        <td>{{ $data->patient->name }}</td>
                    </tr>
                    <tr>
                        <th>Department </th>
                            <td>{{ $data->dept->title }}</td>
                        </tr>
                    <tr>
                        <th>Doctor </th>
                            <td>{{ $data->doc->name }}</td>
                        </tr>
                    <tr>
                    <tr>
                        <th>Date </th>
                            <td>{{ $data->date}}</td>
                    </tr>
                    <tr>
                        <th>Time </th>
                            <td>{{ $data->time}}</td>
                    </tr>
                    <tr>
                        <th>Status </th>
                        @if ($data->bill->status==0)
                        <td class="bg-danger text-white"> Due Bill
                        @else
                            @if ($data->visit==null)
                            <td class="bg-success text-white">  <a href="{{ route('staff.appointments.edit',$data->id) }}" class="btn btn-primary btn-sm "><i class="fa fa-eye"></i> Visit </a>
                                @else
                                <td>Visited on {{ $data->visit->created_at }}
                            @endif
                        @endif
                    </td>
                </tr>
                </table>
            </div>
        </div>
    </div>
@if ($data->visit!=null)
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Visit Details
    </h3>
    </div>
    <div class="card-body">
        
        <div class="table-responsive" id='printable_div_id'>
            <table class="table table-bordered" width="100%">
                <tr>
                <th>Patient </th>
                    <td>{{ $data->patient->name }}</td>
                </tr>
                <tr>
                    <th>Service </th>
                        <td>
                            @switch($data->visit->service_type)
                            @case('appointment')
                                Appointment
                                @break
                            @case('test')
                                Test
                                @break
                            @case('emergency')
                                Emergency
                                @break
                            @case('admission')
                                Admission
                                @break
                            @case('operation')
                                Operation
                                @break
                            @default
                                
                        @endswitch
                        </td>
                    </tr>
                <tr>
                    <th>Doctor </th>
                        <td>{{ $data->doc->name }}</td>
                    </tr>
                <tr>
                <tr>
                    <th>Diagnosis </th>
                        <td>{{ $data->visit->diagnosis}}</td>
                </tr>
                <tr>
                    <th>Prescription </th>
                        <td><img src="{{ asset('storage/'.$data->visit->prescription) }}" alt="Prescription"></td>
                </tr>
                <tr>
                    <th>Status </th>
                    <td class="bg-danger text-white"> {{ $data->visit->created_at }}</td>
            </tr>
            </table>
        </div>
    </div>
</div>
@endif

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

