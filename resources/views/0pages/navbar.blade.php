<!-- Header Area -->
<header class="header" >
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-5 col-12">
                    <!-- Contact -->
                    <ul class="top-link">
                        
                    </ul>
                    <!-- End Contact -->
                </div>
                <div class="col-lg-6 col-md-7 col-12">
                    <!-- Top Contact -->
                    <ul class="top-contact">
                        <li><i class="fa fa-phone"></i>+88 @isset($SiteOption)
                            {{ $SiteOption[4]->value }}
                        @endisset</li>
                        <li><i class="fa fa-envelope"></i><a href="mailto:@isset($SiteOption)
                            {{ $SiteOption[3]->value }}
                        @endisset">@isset($SiteOption)
                            {{ $SiteOption[3]->value }}
                        @endisset</a></li>
                    </ul>
                    <!-- End Top Contact -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12">
                        <!-- Start Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="img/logo.png" alt="#"></a>
                        </div>
                        <!-- End Logo -->
                        <!-- Mobile Nav -->
                        <div class="mobile-nav"></div>
                        <!-- End Mobile Nav -->
                    </div>
                    <div class="col-lg-7 col-md-9 col-12">
                        <!-- Main Menu -->
                        <div class="main-menu">
                            <nav class="navigation">
                                <ul class="nav menu">
                                    <li><a href="{{ route('root') }}">Home</a></li>
                                    {{-- <li><a href="{{ route('doctors') }}">Doctos </a></li> --}}
                                    @auth
                                    <li><a href="#">Profile <i class="icofont-rounded-down"></i></a>
                                        <ul class="dropdown">
                                            <li><a href="{{ route('student.dashboard') }}">Dashboard</a></li>
                                        </ul>
                                    </li>
                                    @else
                                    <li><a href="#">Account <i class="icofont-rounded-down"></i></a>
                                        <ul class="dropdown">
                                            <li><a href="{{ route('login') }}">Login</a></li>
                                            <li><a href="{{ route('register') }}">Register</a></li>
                                        </ul>
                                    </li>
                                    @endauth
                                    @auth('staff')
                                    <li><a href="#">Staff Profile <i class="icofont-rounded-down"></i></a>
                                        <ul class="dropdown">
                                            <li><a href="{{ route('staff.dashboard') }}">Dashboard</a></li>
                                        </ul>
                                    </li>
                                    @endauth
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--/ End Main Menu -->
                    </div>
                    <div class="col-lg-2 col-12">
                        <div class="get-quote">
                            @auth('staff')
                                <a href="{{ route('staff.appointment.create') }}" class="btn">Book Appointment</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<!-- End Header Area -->