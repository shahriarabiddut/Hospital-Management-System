@extends('admin/layout')
@section('title', 'Add New Room')
@section('content')


    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Add New Room
            <a href="{{ url('admin/rooms') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> View All </a> </h3>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
            <form method="POST" action="{{ route('admin.rooms.store') }}" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <th>Select Room Type</th>
                            <td>
                                <select required name="room_type_id" class="form-control">
                                    <option value="0">--- Select Room Type ---</option>
                                    @foreach ($room_type as $dp)
                                    <option value="{{$dp->id}}">{{$dp->title}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    <tr>
                        <th>Title</th>
                        <td><input required name="title" type="text" class="form-control"></td>
                    </tr><tr>
                        <th>Floor</th>
                        <td><input required name="floor" type="text" class="form-control"></td>
                    </tr><tr>
                        <th>Location</th>
                        <td><input required name="location" type="text" class="form-control"></td>
                    </tr><tr>
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

