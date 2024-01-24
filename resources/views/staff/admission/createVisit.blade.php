@extends('staff/layout')
@section('title', 'Add Visit To Admission')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Add Visit To Admission
            <a href="{{ route('staff.admissionvisits.index') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> View All </a> </h3>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
            <form method="POST" action="{{ route('staff.addmission.visit') }}" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                    <tr>
                        <th>Diagnosis</th>
                        <td>
                            <textarea name="diagnosis" rows="3" required class="form-control">Ok</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Prescription</th>
                        <td><textarea name="prescription" rows="3" required class="form-control">Continue</textarea></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <select required name="status" class="form-control">
                                <option selected disabled="">Select Status</option>
                                <option value="Serious! Consultant Needed!" >Serious! Consultant Needed!</option>
                                <option value="Need More Care" >Need More Care</option>
                                <option value="Good" >Good</option>
                                <option value="Release">Release</option>
                                <option value="Ready To Check Out" >Ready To Check Out</option>
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

