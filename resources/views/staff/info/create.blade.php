@extends('staff/layout')
@section('title', 'Add Information')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Add Information
            <a href="{{ url('staff/information') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> View All </a> </h3>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
            <form method="POST" action="{{ route('staff.information.store') }}" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <th>@if ($information == 'degree') Degree @else Speciality @endif <span class="text-danger">*</span></th>
                                <td><select required name="info_id" class="form-control room-list">
                                        <option value="0">Select @if ($information == 'degree') Degree @else Speciality @endif</option>
                                        @foreach ($data as $d)
                                        <option value="{{ $d->id }}"> {{ $d->name }} </option>
                                        @endforeach
                                        </select></td>
                            </tr>
                    <tr>
                        <th>Extra Info</th>
                        <td><input required name="value" type="text" class="form-control" value="N/A"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="information" value="{{ $information }}">
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

