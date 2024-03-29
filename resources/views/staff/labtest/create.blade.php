@extends('staff/layout')
@section('title', 'Add Labtest')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Labtest
            <a href="{{ url('staff/labtest') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> View All </a> </h6>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
            <form method="POST" action="{{ route('staff.labtest.store') }}" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <th>Patient <span class="text-danger">*</span></th>
                                <td><select required name="patient_id" class="form-control room-list">
                                        <option value="0">Select Patient</option>
                                        @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}"> {{ $patient->name }} </option>
                                        @endforeach
                                        </select></td>
                            </tr>
                        <tr>
                    <tr>
                        <th>Test</th>
                        <td>
                            <select required name="test_id[]" class="form-control room-list" multiple>
                            <option value="0">Select Test</option>
                            @foreach ($test as $labtest)
                            <option value="{{ $labtest->id }}"> {{ $labtest->name }} - {{ $labtest->price }} Tk </option>
                            @endforeach
                            </select>
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

