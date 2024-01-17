@extends('admin/layout')
@section('title', 'Degree Details')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Degree Details of  {{ $data->name }} 
            <a href="{{ url('admin/degree') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> View All </a> </h3>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered" width="100%">
                    <tr>
                        <th>Name</th>
                        <td>{{ $data->name }}</td>
                    </tr>
                    <tr>
                        <th>Doctors</th>
                        <td>
                            @foreach ($data->doctorDegree as $key => $doctorDegree)
                               {{ $key+1 }}. {{ $doctorDegree->doctor->name }} <br>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="{{ url('admin/degree/'.$data->id.'/edit') }}" class="float-right btn btn-info btn-sm"><i class="fa fa-edit"> Edit {{ $data->name }}  </i></a>
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

