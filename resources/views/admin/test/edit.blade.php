@extends('admin/layout')
@section('title', 'Edit Test')
@section('content')


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Editing Test : {{ $data->name }}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Test
            <a href="{{ route('admin.test.index') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> View All </a> </h6>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
            <form method="POST" action="{{ route('admin.test.update',$data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <th>Test Name</th>
                        <th>Range Data</th>
                    </thead>
                    @php $string = 'test';$normal = 'normalrange'; @endphp
                    <tbody>
                        @for ($i=1;$i<=$totalTest;$i++)
                        @php $temp = $string.$i;$tempnormal = $normal.$i; @endphp
                        <tr>
                            <th>{{ $data->$temp }}</th>
                            <td><input required name="normalrange{{$i}}" value="{{ $data->$tempnormal }}" type="text" class="form-control"></td>
                        </tr>
                        @endfor
                    <tr>
                    <tr>
                        <td colspan="2">
                            <input name="totalTest" value="{{ $totalTest }}" type="hidden">
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

