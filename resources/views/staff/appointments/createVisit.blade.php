@extends('staff/layout')
@section('title', 'Add Visit To Appointment')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Add Visit To Appointment
            <a href="{{ url('staff/appointpent') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> View All </a> </h3>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
            <form method="POST" action="{{ route('staff.appointments.update') }}" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                    <tr>
                        <th>Diagnosis</th>
                        <td>
                            <textarea name="diagnosis" rows="3" required class="form-control"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Prescription</th>
                        <td><input name="prescription" type="file" required class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <select required name="status" class="form-control">
                                <option selected disabled="">Select Status</option>
                                <option value="Take Admission" >Take Admission</option>
                                <option value="Visit Again in A Week" >Visit Again in A Week</option>
                                <option value="Visit Again in A Month">Visit Again in A Month</option>
                                <option value="Visit Again in A Half Year" >Visit Again in Half Year</option>
                                <option value="Visit Again in A Year" >Visit Again in A Year</option>
                                <option value="No Need to Visit Again" >No Need to Visit Again</option>
                                </select>
                            </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <input name="id" type="hidden" value="{{ $data->id }}">
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

