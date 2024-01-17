@extends('staff/layout')
@section('title', 'Create Appointment')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Create Appointment
            <a href="{{ url('staff/appointpent') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> View All </a> </h3>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
            <form method="POST" action="{{ route('staff.appointment.store') }}" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <th>Patient <span class="text-danger">*</span></th>
                                <td><select required name="user_id" class="form-control room-list">
                                        <option value="0">Select Patient</option>
                                        @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}"> {{ $patient->name }} </option>
                                        @endforeach
                                        </select></td>
                            </tr>
                    <tr>
                        <th>Purpose of Treatment</th>
                        <td><input required name="purpose" type="text" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Department <span class="text-danger">*</span></th>
                            <td><select required name="department" class="form-control room-list">
                                    <option value="0">Select Department</option>
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->id }}"> {{ $department->title }} </option>
                                    @endforeach
                                    </select></td>
                        </tr>
                    <tr>
                        <tr>
                            <th>Doctor <span class="text-danger">*</span></th>
                                <td><select required name="doctor" class="form-control room-list">
                                        <option value="0">Select Doctor</option>
                                        @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}"> {{ $doctor->name }} </option>
                                        @endforeach
                                        </select></td>
                            </tr>
                        <tr>
                    <tr>
                        <th>Date</th>
                        <td><input name="date" type="date" min="{{ $nextDate }}" required class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Time</th>
                        <td>
                            <select name="time" required name="purpose" class="form-control">
                                <option value="" selected="" disabled="">Select Time</option>
                                <option value="8 AM - 10 AM">8 AM - 10 AM</option>
                                <option value="10 AM - 12 PM" >10 AM - 12 PM</option>
                                <option value="12 PM - 2 PM" >12 PM - 2 PM</option>
                                <option value="2 PM - 4 PM" >2 PM - 4 PM</option>
                                <option value="4 PM - 6 PM" >4 PM - 6 PM</option>
                                <option value="6 PM - 8 PM" >6 PM - 8 PM</option>
                                <option value="8 PM - 10 PM" >8 PM - 10 PM</option>
                                </select>
                            </td>
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
    @endsection
@endsection

