				<!--=== Header v1 ===-->
	<div class="header-v1">
        <!-- Topbar -->
        <div class="topbar-v1">
        <div class="container">
        <div class="row">
        <div class="col-md-6">
                <ul class="list-inline top-v1-contacts">
                <li>
                <i class="fa fa-envelope"></i> Email: @isset($SiteOption)
                {{ $SiteOption[3]->value }}
            @endisset
                </li>
                <li>
                <i class="fa fa-phone"></i> Contact no : @isset($SiteOption)
                {{ $SiteOption[4]->value }}
            @endisset
                </li>
                </ul>
    </div>
    </div>
    </div>
    </div>
    
    <!-- End Topbar -->
                <!-- Navbar -->
				<div class="navbar mega-menu" role="navigation">
                    <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="res-container">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
    
                    <div class="navbar-brand">
                    <a href="{{ route('root') }}">
                        @isset($SiteOption)
                        <img src="{{ asset($SiteOption[1]->value) }}" alt="Logo" srcset="" width="100%">
                        @endisset
                    </a>
                    </div>
                    </div><!--/end responsive container-->
    
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <div class="res-container">
                    <ul class="nav navbar-nav">
    
                    <!-- Collect the nav links, forms, and other content for toggling -->
    
    
                    <!-- Home  -->
                    <li class="mega-menu-fullwidth">
                    <a href="{{ route('root') }}" >
                    HOME
                    </a>
    
                    </li>
                    <!-- End Home-->
                    <!-- Doctors -->
                    <li class="mega-menu-fullwidth">
                    <a href="{{ route('doctors') }}" >
                    DOCTORS
                    </a>
    
                    </li>
                    <!-- End Doctors -->
                    <!-- Gallery -->
                    <li class="mega-menu-fullwidth">
                    <a href="#" >
                    GALLERY
                    </a>
    
                    </li>
                    <!-- End Gallery -->
                    <!-- Blog -->
                    <li class="mega-menu-fullwidth">
                    <a href="#" >
                    BLOGS
                    </a>	
                    </li>
                    <!-- End Blog -->
    
                    <!-- Contact Us -->
                    <li class="mega-menu-fullwidth">
                    <a href="{{ route('contact') }}" >
                    CONTACT US
                    </a>	
                    </li>
                    <!-- End Contact us -->
                    @if (Route::has('login'))
            @auth
            <li class="mega-menu-fullwidth"><a href="{{ route('student.dashboard') }}">Profile</a></li>
            <li class="mega-menu-fullwidth"><a href="{{ route('logout') }}">Logout</a></li>
            @else
            <li class="mega-menu-fullwidth"><a href="{{ route('login') }}">LOGIN</a></li>
              @if (Route::has('register'))
              <li class="mega-menu-fullwidth"><a href="{{ route('register') }}">REGISTER</a></li>
              @endif
            @endauth
            @endif
    
                    </ul>
    
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <!-- End Navbar -->