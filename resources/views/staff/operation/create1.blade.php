@extends('staff/layout')
@section('title', 'Add Operation')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Operation
            <a href="{{ url('staff/operation') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> View All </a> </h6>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
            <form method="POST" action="{{ route('staff.operation.store') }}" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <th>Admission <span class="text-danger">*</span></th>
                                <td>
                                <input readonly name="admission_id" type="text" value="{{ $admission->id }}" class="form-control" placeholder="{{ $admission->patient->name }}">
                                <input name="patient_id" type="hidden" value="{{ $admission->patient_id }}" class="form-control">
                            </tr>
                        <tr>
                    <tr>
                        <th>Operation</th>
                        <td>
                            <select required name="operation_id" class="form-control room-list">
                            <option value="0">Select Operation</option>
                            @foreach ($operation as $operation)
                            <option value="{{ $operation->id }}"> {{ $operation->title }} - {{ $operation->price }} Tk </option>
                            @endforeach
                            </select>
                        </td>
                    </tr>
                        <tr>
                            <th>Doctor <span class="text-danger">*</span></th>
                                <td><select required name="doctor_id" class="form-control room-list">
                                        <option value="0">Select Doctor</option>
                                        @foreach ($doctor as $doctor)
                                        <option value="{{ $doctor->id }}"> {{ $doctor->name }} </option>
                                        @endforeach
                                        </select></td>
                            </tr>
                    <tr>
                        <th>OT Type</th>
                        <td>
                            <select required name="ot_type" class="form-control">
                                <option value="0"> Select OT TYPE</option>
                                <option value="1"> Single theatre, containing one operating table.</option>
                                <option value="2"> Double theatre, containing two operating tables.</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Instruction</th>
                        <td>
                            <textarea placeholder="Add Instruction" name="instruction" rows="4" class="form-control"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>
                            <textarea placeholder="Add Description" name="description" rows="4" class="form-control"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td><input name="date" type="date" min="{{ $nextDate }}" required class="form-control"></td>
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

