@extends('admin/layout')
@section('title', 'Room Details')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Room Details of <span class="bg-warning">-- {{ $data->title }} -- </span> 
            <a href="{{ url('admin/rooms') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> View All </a> </h6>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered" width="100%">
                    <tr>
                        <th>Title</th>
                        <td>{{ $data->title }}</td>
                    </tr><tr>
                        <th>Floor</th>
                        <td>{{ $data->floor }}</td>
                    </tr><tr>
                        <th>Location</th>
                        <td>{{ $data->location }}</td>
                    </tr><tr>
                        <th>Room Type</th>
                        <td>{{ $data->room_type->title }}</td>
                    </tr><tr>
                        <th>Vacancy</th>
                        <td>{{ $data->vacancy }}</td>
                    </tr><tr>
                        <td colspan="2">
                            <a href="{{ url('admin/rooms/'.$data->id.'/edit') }}" class="float-right btn btn-info btn-sm"><i class="fa fa-edit"> Edit {{ $data->title }}  </i></a>
                        </td>
                        
                    </tr>
                   
                    
                </table>
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

