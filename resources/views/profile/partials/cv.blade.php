@extends('layout')
@section('title', ' My CV | Student Dashboard')

@section('content')
<!-- Page Heading -->

    <div class="container py-5">
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
      <div class="border border-secondary rounded h3 mb-2 text-gray-800 p-2 bg-white"> <h2 class="d-inline"> CV of {{ $user->name }} </h2> <a href="{{ route('cvview',$user->id) }}" class=" text-white"><h2 class="bg-info px-2 d-inline float-right">CV Page</h2></a></div>
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-1">
            <div class="card-body text-center">
                <img src="{{$user->photo ? asset('storage/'.$user->photo) : url('images/user.png')}}" alt="User Photo" class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{ $user->name }}</h5>
              <p class="text-muted mb-1">{{ $user->email }}</p>
              <p class="text-muted mb-4">{{ $user->address }}</p>
              <p class="text-muted mb-4">{{ $user->mobile }}</p>
              <a href="{{ route('student.profile.edit') }}"><button type="button" class="btn btn-primary btn-block">Edit Profile </button></a>
            </div>
          </div>
          {{-- Skills --}}
          <div class="card mb-1">
            <div class="card-body text-center">
                <h3 class="text-center text-white bg-info d-block p-1"> SKILLS </h3>
                @foreach ($skills as $skill)
                <div class="text-justify mb-1"><h4 class="text-left d-inline"> {{ $skill->skill }} </h4><span class="float-right"><a href="{{ route('student.profile.editskill',$skill->id) }}"> <i class="fa fa-pen mx-1"> </i> </a> | <a class="text-danger" href="{{ route('student.profile.skilldestroy',$skill->id) }}"> <i class="fa fa-trash mx-1"> </i> </a></span> <br> <p>{{ $skill->skilldetail }}</p> </div>
                @endforeach                
                <a href="{{ route('student.profile.skill') }}"><button type="button" class="btn btn-primary btn-block"> + Add Skills</button></a>
              
            </div>
          </div>
          {{-- End --}}
          {{-- Languages --}}
          <div class="card mb-1">
            <div class="card-body text-center">
                <h3 class="text-center text-white bg-info d-block p-1"> LANGUAGES</h3>
                @foreach ($language as $lang)
                <p class="text-center mb-1"><b> {{ $lang->language }} </b> : {{ $lang->fluency }} <a href="{{ route('student.profile.editlang',$lang->id) }}"> <i class="fa fa-pen mx-1"> </i></a> | <a class="text-danger" href="{{ route('student.profile.langdestroy',$lang->id) }}"> <i class="fa fa-trash mx-1"> </i> </a></p>
                @endforeach                
                <a href="{{ route('student.profile.langadd') }}"><button type="button" class="btn btn-primary btn-block"> + Add Language</button></a>
              
            </div>
          </div>
          {{-- End --}}
          
        </div>
        
        <div class="col-lg-8">
          <div class="card shadow mb-1">
            <h3 class="text-center text-white bg-info d-block p-1"> Profile </h3>

          @if ($bio)
          <p class="text-justify mb-1 p-3">{{ $bio->bio }}</p>
          <p class="text-center"><a href="{{ route('student.profile.editbio',$bio->id) }}"> <i class="fa fa-pen mx-1"> </i> Edit</a> </p>
          
          @else
          <a href="{{ route('student.profile.profile') }}"><button type="button" class="btn btn-primary btn-block"> + Add Profile Bio</button></a>
          @endif
          </div>

          <div class="card shadow mb-1">
            <h3 class="text-center text-white bg-info d-block p-1"> Education Qualification </h3>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Degree</th>
                                <th>Board</th>
                                <th>Institution</th>
                                <th>Grade</th>
                                <th>Year</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($education)
                            @foreach ($education as $key => $d)
                            <tr>
                                <td>{{ $d->degree }}</td>
                                <td>{{ $d->board }}</td>
                                <td>{{ $d->institution }}</td>
                                <td>{{ $d->grade }}</td>
                                <td>{{ $d->year }}</td>
                                <td><a href="{{ route('student.profile.editeducation',$d->id) }}"> <i class="fa fa-pen mx-1"> </i></a> | <a class="text-danger" href="{{ route('student.profile.educationdestroy',$d->id) }}"> <i class="fa fa-trash mx-1"> </i> </a></td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <a href="{{ route('student.profile.education') }}"><button type="button" class="btn btn-primary btn-block"> + Add Education Qualification</button></a>

                </div>
            </div>
          </div>

          <div class="card shadow mb-1">
            <h3 class="text-center text-white bg-info d-block p-1"> Experience </h3>
            <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                      
                      <tbody>
                          @if($experience)
                          @foreach ($experience as $key => $e)
                          <tr>
                              <td>{{ $e->year }} <br>{{ $e->status }} <br>
                              <p>{{ $e->institution }}</p>
                              
                            </td>
                              <td>{{ $e->title }}
                              <p>{{ $e->detail }}</p>
                              </td>
                              <td><a href="{{ route('student.profile.editexperience',$e->id) }}"> <i class="fa fa-pen mx-1"> </i></a> | <a class="text-danger" href="{{ route('student.profile.experiencedestroy',$e->id) }}"> <i class="fa fa-trash mx-1"> </i> </a></td>
                          </tr>
                          @endforeach
                          @endif
                      </tbody>
                  </table>
                  <a href="{{ route('student.profile.experience') }}"><button type="button" class="btn btn-primary btn-block"> + Add Experience</button></a>

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