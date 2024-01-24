@extends('staff/layout')
@section('title', 'Bill Invoice')
@section('content')


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bill Invoice
            <a href="{{ route('staff.bill.index')}}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left mx-1"></i> View All </a>
            <button onClick="printdiv('printable_div_id');" class="float-right btn btn-success btn-sm mx-1"><i class="fa fa-print"> Print </i></button>
        </h6>
        </div>
        <div class="card-body">
            @php
                $totalBill = 0;
            @endphp
            <div class="table-responsive" id='printable_div_id'>
                
                <h1>Invoice</h1>
                <table class="table table-bordered" width="100%">
                    <tr>
                    <br>Patient : {{ $patient->name }} <br>
                        Guardian : {{$patient->guardian}}<br>
                        Address : {{$patient->address}}<br>
                        Contact : {{$patient->mobile}}</td>
                    </tr>
                </table>
                
                <table class="table table-bordered my-0" width="100%">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Details</th>
                            <th>Charge</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $bill)
                    <tr>
                    <th width="40%"> 
                        @switch($bill->service_type)
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
                            @case('admissionvisit')
                            Admission Visit
                            @break
                            @default
                                
                        @endswitch
                    </th>
                    <td width="40%">Details : <br>
                        @switch($bill->service_type)
                        @case('appointment')
                            Date - {{ $bill->appointment->date }} <br>
                            Time - {{ $bill->appointment->time }}
                            @break
                        @case('test')
                            {{ $bill->labtest->test->name }} - {{ $bill->labtest->date }}
                            @break
                        @case('emergency')
                            {{ $bill->emergency->emergency }} 
                            @break    
                        @case('admission')
                        @php
                            $date1 = \Carbon\Carbon::parse($bill->admission->check_in);
                            $date2 = \Carbon\Carbon::parse($bill->admission->check_out);
                            $diff = $date1->diff($date2);
                            $daysDifference = $diff->days;
                            if ($daysDifference == 0) {
                                $daysDifference = 1;
                            }
                        @endphp
                            {{ $daysDifference }} Days <br>
                            {{ $bill->admission->room_type->title }} ({{ $bill->admission->room_type->price }}/=) - Room No - {{ $bill->admission->room->title }} <br>
                            {{ $bill->admission->seat }} seats 
                            @break
                        @case('operation')
                            {{ $bill->operation->operation->title }} <br>
                            @if ($bill->operation->ot_type == 1)
                            Single theatre - (1000/=)
                            @else
                            Double theatre - (5000/=)
                            @endif

                            @break
                        @case('admissionvisit')
                            Visited on {{$bill->visit->created_at->format("F j, Y")}}
                            @break
                        @default
                            
                        @endswitch
                    </td>
                    <td> {{$bill->price}}</td>
                    </tr>
                    @php
                    $totalBill +=$bill->price;
                @endphp
                @endforeach
                </tbody>
                </table>
                
                <table class="table table-bordered my-0" width="100%">
                    <tr>
                    <td width="80%">Total Bill </td>
                    <td> {{$totalBill}}</td>
                    </tr>
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

