@extends('admin/layout')
@section('title', 'Edit Medicine')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Medicine
            <a href="{{ url('admin/medicine/') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> View All </a> </h6>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
            <form method="POST" action="{{ route('admin.medicine.update',$data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                    <tr>
                        <th>Title</th>
                        <td><input name="name" value="{{ $data->name }}" type="text" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Generic</th>
                        <td><input required value="{{ $data->generic }}" name="generic" type="text" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Strength</th>
                        <td><input required value="{{ $data->strength }}" name="strength" type="text" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td><input required value="{{ $data->type }}" name="type" type="text" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td><input required value="{{ $data->price }}" name="price" type="number" step="0.01" class="form-control"></td>
                    </tr><tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary">Update</button>
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

