<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Login | @isset($SiteOption)
        {{ $SiteOption[2]->value }}
    @endisset </title>
    <!-- Custom fonts for this template-->
    <link href="{{  asset('vendor/fontawesome-free/css/all.min.css')  }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body>

    <section class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark" style="min-height: 100vh; background-size: cover; background-image:{{ asset('img/bglogin.jpg') }};">
        <div class="container-fluid">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
          <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
            <div class="col-12 col-md-4 col-lg-4 h-50 ">
              <div class="card shadow">
                <div class="bg-dark card-body mx-2">
                  
                <div class=" text-white text-justify">
                    Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                </div>
                <div class="row">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                       <button type="submit">Resend Verification Email</button>
                    </form>
            
                    <form method="GET" action="{{ route('logout') }}">
                        @csrf
            
                        <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
     </section>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    @yield('scripts')


</body>

</html>
