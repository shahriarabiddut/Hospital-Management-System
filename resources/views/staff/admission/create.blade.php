@extends('staff/layout')
@section('title', 'Add Admission')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Add Admission
            <a href="{{ url('staff/admission') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> View All </a> </h3>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
            <form method="POST" action="{{ route('staff.admission.store') }}" enctype="multipart/form-data" onsubmit="return validateDates()">
                @csrf
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <th>Patient <span class="text-danger">*</span></th>
                                <td><select required name="patient_id" class="form-control">
                                        <option value="0">Select Patient</option>
                                        @foreach ($pateient as $pateients)
                                        <option value="{{ $pateients->id }}"> {{ $pateients->name }} </option>
                                        @endforeach
                                        </select></td>
                            </tr>
                    <tr>
                        <th>Doctor</th>
                        <td>
                            <select required name="doctor_id" class="form-control">
                            <option value="0">Select Doctor</option>
                            @foreach ($doctor as $doctors)
                            <option value="{{ $doctors->id }}"> {{ $doctors->name }} </option>
                            @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Nurse <span class="text-danger">*</span></th>
                            <td><select required name="nurse_id" class="form-control">
                                    <option value="0">Select Nurse</option>
                                    @foreach ($nurse as $nurses)
                                    <option value="{{ $nurses->id }}"> {{ $nurses->name }} </option>
                                    @endforeach
                                    </select></td>
                        </tr>
                        <tr>
                            <th>Check In Date <span class="text-danger">*</span></th>
                                 <td><input required name="check_in" type="date" id="checkin_date" class="form-control checkin-date" min=""></td>
                             </tr>
                             <tr>
                                 <th>Check Out Date  <span class="text-danger">*</span></th>
                                 <td><input required name="check_out" id="checkout_date" type="date" class="form-control" min=""></td>
                             </tr>
                    <tr>
                        <th>Room</th>
                        <td><select required name="room_id" class="form-control room-list">
                        </select></td>
                    </tr>
                    <tr>
                        <th>Seat <span class="text-danger">*</span></th>
                        <td><input required name="seat" type="number" class="form-control" value="1"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
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
    <script type="text/javascript">
        // Hiding Old Dates
        const dateField1 = document.getElementById('checkin_date');
        const currentDate1 = new Date().toISOString().split('T')[0];
        dateField1.setAttribute('min', currentDate1);
        const dateField2 = document.getElementById('checkout_date');
        const currentDate2 = new Date().toISOString().split('T')[0];
        dateField2.setAttribute('min', currentDate2);
        // Hiding Old Dates
        // Validate if checkout date is not less then or eual checkindate
        function validateDates() {
        const checkinDate = new Date(document.getElementById('checkin_date').value);
        const checkoutDate = new Date(document.getElementById('checkout_date').value);
    
        if (checkoutDate.getTime() <= checkinDate.getTime()) {
            alert('Error: The checkout date must be after the check-in date');
            return false; // prevent form submission
        }
    
        return true; // allow form submission
        }
        // Validate if checkout date is not less then or eual checkindate
        // If rooms are available or not
        $(document).ready(function(){
            $(".checkin-date").on('blur',function(){
                let _checkindate = $(this).val();
                //Ajax
                $.ajax({
                    url:"{{ url('staff/booking') }}/available-rooms/" + _checkindate,
                    // type:'post',
                    dataType:'json',
                    beforeSend:function(){
                        $(".room-list").html('<option>-- Loading --</option>');
                    },
                    success:function(res){
                        let _html = '';
                        $.each(res.data,function(index,row){
                            _html+='<option value="'+row.room.id+'">'+row.room.title+' - '+row.roomtype.title+'</option>';
                        });
                        $(".room-list").html(_html);
                    }
                });
            });
        });
        // If rooms are available or not
    </script>
    @endsection
@endsection

