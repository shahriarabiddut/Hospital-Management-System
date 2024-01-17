@extends('staff/layout')
@section('title', ' My Information | Doctor Dashboard')

@section('content')
<!-- Page Heading -->

    <div class="container pt-3">
    <!-- Session Messages Starts -->
    @if(Session::has('success'))
    <div class="p-3 mb-2 bg-success text-white">
        <p>{{ session('success') }} </p>
    </div>
    @endif
    @if(Session::has('danger'))
    <div class="p-3 mb-2 bg-danger text-white">
        <p>{{ session('danger') }} </p>
    </div>
    @endif
    <!-- Session Messages Ends -->
      <h1 class="border border-secondary rounded h3 mb-2 text-gray-800 p-2 bg-white"> My Information </h1>
      

      <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
              <div class="card-body">
                  <h3> Speciality </h3>
                  <hr>
                  @foreach ($data2 as $spcialityData )
                  <div class="row">
                     <div class="col-sm-3">
                       <p class="mb-0">{{ $spcialityData->speciality->name }}</p>
                     </div>
                     <div class="col-sm-6">
                       <p class="text-muted mb-0">{{ $spcialityData->speciality->value }}</p>
                     </div>
                     <div class="col-sm-3">
                      <a href="{{ route('staff.information.delete',['id' => $spcialityData->id, 'information' => 'speciality']) }}"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                    </div>
                   </div>
                   <hr>
                   
                  @endforeach
                
                <div class="row">
                  <div class="col-sm-3 float-left">
                    <a href="{{ route('staff.information.create1','speciality') }}"><button type="button" class="btn btn-primary"> + Add Speciality</button></a>
                  </div>
                  
                </div>
              </div>
            </div>
            
          </div>
        <div class="col-lg-6">
          <div class="card mb-4">
            <div class="card-body">
                <h3> Degrees </h3>
                <hr>
                @foreach ($data as $degreeData )
                <div class="row">
                   <div class="col-sm-3">
                     <p class="mb-0">{{ $degreeData->degree->name }}</p>
                   </div>
                   <div class="col-sm-6">
                     <p class="text-muted mb-0">{{ $degreeData->degree->value }}</p>
                   </div>
                   <div class="col-sm-3">
                    <a href="{{ route('staff.information.delete',['id' => $degreeData->id, 'information' => 'degree']) }}"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                  </div>
                 </div>
                 <hr>
                 
                @endforeach
              
              <div class="row">
                <div class="col-sm-3 float-left">
                  <a href="{{ route('staff.information.create1','degree') }}"><button type="button" class="btn btn-primary"> + Add Degree</button></a>
                </div>
                
              </div>
            </div>
          </div>
          
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