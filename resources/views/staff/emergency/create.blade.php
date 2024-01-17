@extends('staff/layout')
@section('title', 'Create Emergency')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Create Emergency
            <a href="{{ url('staff/emergency') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> View All </a> </h3>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
            <form method="POST" action="{{ route('staff.emergency.store') }}" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>Select Patient</td>
                        <td><select id="options" onchange="showInputField()" class="form-control">
                            <option value="0">Select</option>
                            <option value="option1">Existing Patient</option>
                            <option value="option2">New Patient</option>
                            </select></td>
                    </tr>
                    <tr id="oldpatient" style="display: none">
                        <th>Old Patient <span class="text-danger">*</span></th>
                            <td><select required name="patient_id" class="form-control room-list">
                                    <option value="0">Select Patient</option>
                                    @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}"> {{ $patient->name }} </option>
                                    @endforeach
                                    </select></td>
                        </tr>
                        {{-- New Pateint --}}
                        <tr id="newpatient" style="display: none">
                            <th>Name</th>
                            <td><input name="name" type="text" class="form-control"></td>
                        </tr>
                        <tr id="newpatient1" style="display: none">
                            <th>Mobile</th>
                            <td><input name="mobile" type="text" max="11" class="form-control"></td>
                        </tr>
                        <tr id="newpatient2" style="display: none">
                                <th>Guardian</th>
                                <td><input name="guardian" type="text" class="form-control"></td>
                        </tr>
                        <tr id="newpatient3" style="display: none">
                                <th>Date of Birth</th>
                                <td><input name="dob" type="date" class="form-control"></td>
                        </tr>
                        <tr id="newpatient4" style="display: none">
                                <th>Address</th>
                                <td><input name="address" type="text" class="form-control"></td>
                        </tr>
                        {{-- New Patient End --}}
                        <tr>
                            <th>Emergency</th>
                            <td><input required name="emergency" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Bill</th>
                            <td><input required name="bill" type="number" value="200" class="form-control"></td>
                        </tr>
                    <tr>
                        <th>Department <span class="text-danger">*</span></th>
                            <td><select required name="department_id" class="form-control room-list">
                                    <option value="0">Select Department</option>
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->id }}"> {{ $department->title }} </option>
                                    @endforeach
                                    </select></td>
                        </tr>
                    <tr>
                        <tr>
                            <th>Doctor <span class="text-danger">*</span></th>
                                <td><select required name="doctor_id" class="form-control room-list">
                                        <option value="0">Select Doctor</option>
                                        @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}"> {{ $doctor->name }} </option>
                                        @endforeach
                                        </select></td>
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
    <script>
        function showInputField() {
          let selectedOption = document.getElementById("options").value;
          let oldpatient = document.getElementById("oldpatient");
          let newpatient = document.getElementById("newpatient");
          let newpatient1 = document.getElementById("newpatient1");
          let newpatient2 = document.getElementById("newpatient2");
          let newpatient3 = document.getElementById("newpatient3");
          let newpatient4 = document.getElementById("newpatient4");
    
          // Reset the display property for all options
            oldpatient.style.display = "none";
            newpatient.style.display = "none";
            newpatient1.style.display = "none";
            newpatient2.style.display = "none";
            newpatient3.style.display = "none";
            newpatient4.style.display = "none";
          // Set the input field as not required
            newpatient.required = false;
            newpatient1.required = false;
            newpatient2.required = false;
            newpatient3.required = false;
            newpatient4.required = false;
          // Show the input field based on the selected option
          if (selectedOption === "option1") {
              oldpatient.style.display = "table-row";
          } else if (selectedOption === "option2") {
              newpatient.style.display = "table-row";
              newpatient1.style.display = "table-row";
              newpatient2.style.display = "table-row";
              newpatient3.style.display = "table-row";
              newpatient4.style.display = "table-row";
              newpatient.setAttribute("required", "required");
              newpatient1.setAttribute("required", "required");
              newpatient2.setAttribute("required", "required");
              newpatient3.setAttribute("required", "required");
              newpatient4.setAttribute("required", "required");
          }
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

