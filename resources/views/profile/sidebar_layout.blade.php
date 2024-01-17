<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('student.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15 col-md-4">
            @isset($SiteOption)
            <img src="{{ asset($SiteOption[1]->value) }}" alt="" srcset="" width="100%">
            @endisset
        </div>
        <div class="sidebar-brand-text mx-2 col-md-8">Patient Panel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('student.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
         Appointments
    </div>

    <!-- Nav Item Room - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if(!request()->is('student/appointments*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-hotel"></i>
            <span>Appointments</span>
        </a>
        <div id="collapseTwo" class="collapse @if(request()->is('student/appointments*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"> Appointment Management</h6>
                <a class="collapse-item" href="{{ route('student.appointment.index') }}">View Appointments</a>

                
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item Support - Utilities Collapse Menu -->
    <!-- Heading -->
    <div class="sidebar-heading">
        Support System
   </div>
    <li class="nav-item">
        <a class="nav-link @if (!request()->is('student/support*'))
            collapsed
        @endif" href="#" data-toggle="collapse" data-target="#collapseSeven"
            aria-expanded="true" aria-controls="collapseSeven">
            <i class="fas fa-ticket-alt"></i>
            <span>Support</span>
        </a>
        <div id="collapseSeven" class="collapse @if(request()->is('student/support*')) show @endif" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Support Ticket Management</h6>
                <a class="collapse-item" href="{{ route('student.support.index') }}">View Support Tickets</a>
                <a class="collapse-item" href="{{ route('student.support.create') }}">Add New </a>
            </div>
        </div>
    </li>
   

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    

</ul>
<!-- End of Sidebar -->