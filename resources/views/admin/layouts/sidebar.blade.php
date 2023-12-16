<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15 col-md-4">
            @isset($SiteOption)
            <img src="{{ asset($SiteOption[1]->value) }}" alt="" srcset="" width="100%">
            @endisset
        </div>
        <div class="sidebar-brand-text mx-2 col-md-8">Admin Panel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
         User System
    </div>
    <!-- Nav Item Customer - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/student*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-users"></i>
            <span>Patient</span>
        </a>
        <div id="collapseOne" class="collapse @if(request()->is('admin/student*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Patient Management</h6>
                <a class="collapse-item" href="{{ route('admin.patient.index') }}">View All</a>
                <a class="collapse-item" href="{{ route('admin.patient.create') }}">Add new </a>
            </div>
        </div>
    </li>
     <!-- Nav Item Department - Utilities Collapse Menu -->
     <li class="nav-item">
        <a class="nav-link @if (!request()->is('admin/department*'))
            collapsed
        @endif" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-table"></i>
            <span>Staff Departments</span>
        </a>
        <div id="collapseTwo" class="collapse @if(request()->is('admin/department*')) show @endif" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Department Management</h6>
                <a class="collapse-item" href="{{ route('admin.department.index') }}">View All</a>
                <a class="collapse-item" href="{{ route('admin.department.create') }}">Add new</a>
            </div>
        </div>
    </li>
    <!-- Nav Item Staff - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if (!request()->is('admin/staff*'))
            collapsed
        @endif" href="#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-users"></i>
            <span>Staff</span>
        </a>
        <div id="collapseThree" class="collapse @if(request()->is('admin/staff*')) show @endif" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Staff Management</h6>
                <a class="collapse-item" href="{{ route('admin.staff.index') }}">View All</a>
                <a class="collapse-item" href="{{ route('admin.staff.create') }}">Add new</a>
            </div>
        </div>
    </li>

   
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
     Email System
    </div>
    <!-- Nav Email Services - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if (!request()->is('admin/email*'))
            collapsed
        @endif" href="#" data-toggle="collapse" data-target="#collapseSeven"
            aria-expanded="true" aria-controls="collapseSeven">
            <i class="fa fa-envelope"></i>
            <span>Email Service</span>
        </a>
        <div id="collapseSeven" class="collapse @if(request()->is('admin/email*')) show @endif" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Email Management</h6>
                <a class="collapse-item" href="{{ route('admin.email.index') }}">View All</a>
                <a class="collapse-item" href="{{ route('admin.email.create') }}">Add new</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
         Complaints System
    </div>
    <!-- Nav Item Support - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if (!request()->is('student/support*'))
            collapsed
        @endif" href="#" data-toggle="collapse" data-target="#collapseEight"
            aria-expanded="true" aria-controls="collapseEight">
            <i class="fas fa-ticket-alt"></i>
            <span>Support</span>
        </a>
        <div id="collapseEight" class="collapse @if(request()->is('student/support*')) show @endif" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Support Ticket Management</h6>
                <a class="collapse-item" href="{{ route('admin.support.index') }}">View Support Tickets</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
    System Settings 
    </div>
    <!-- Nav Email Services - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.settings.edit') }}">
            <i class="fa fa-cog"></i>
            <span>Settings</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar - Logout - CopyRight) -->
    @include('../layouts/sidebar_toggle')
    <!-- End Sidebar Toggler (Sidebar - Logout - CopyRight) -->
</ul>