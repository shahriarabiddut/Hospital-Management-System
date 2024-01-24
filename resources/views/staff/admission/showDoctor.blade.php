@extends('staff/layout')
@section('title', 'Admission Visit Details')
@section('content')


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Patient
            <a href="{{ route('staff.admissionvisits.index') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left mx-1"></i> View All </a>
        </h3>
        </div>
        <div class="card-body">
            
            <div class="table-responsive" id='printable_div_id'>
                <table class="table table-bordered" width="100%">
                    <tr>
                    <th>Patient</th>
                        <td>{{ $patientA->patient->name }}</td>
                    </tr>
                    <tr>
                    <th>Full Name </th>
                        <td>{{ $patientA->patient->name }}</td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>
@foreach ($data as $visit)
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Visit Details of {{ $visit->created_at->format("F j, Y") }}
    </h3>
    </div>
    <div class="card-body">
        
        <div class="table-responsive" id='printable_div_id'>
            <table class="table table-bordered" width="100%">
                <tr>
                    <th>Diagnosis </th>
                        <td>{{ $visit->diagnosis}}</td>
                </tr>
                <tr>
                    <th>Prescription </th>
                        <td>{{ $visit->prescription }}</td>
                </tr>
                <tr>
                    <th>Status </th>
                    <td class="bg-info text-white"> {{ $visit->status }}</td>
                </tr>
                
            </table>
        </div>
    </div>
</div>
@endforeach
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

