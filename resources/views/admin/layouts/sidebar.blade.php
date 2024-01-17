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
        Hospital Management
   </div>
   <!-- Nav Item Tests - Pages Collapse Menu -->
   <li class="nav-item">
       <a class="nav-link @if(!request()->is('admin/test*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#collapsetest"
           aria-expanded="true" aria-controls="collapsetest">
           <i class="fas fa-fw fa-users"></i>
           <span>Test</span>
       </a>
       <div id="collapsetest" class="collapse @if(request()->is('admin/test*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
               <h6 class="collapse-header">Test Management</h6>
               <a class="collapse-item" href="{{ route('admin.test.index') }}">View All</a>
               <a class="collapse-item" href="{{ route('admin.test.create') }}">Add new </a>
           </div>
       </div>
   </li>
   <!-- Nav Item Operation - Pages Collapse Menu -->
   <li class="nav-item">
    <a class="nav-link @if(!request()->is('admin/operation*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseoperation"
        aria-expanded="true" aria-controls="collapseoperation">
        <i class="fas fa-fw fa-users"></i>
        <span>Operation</span>
    </a>
    <div id="collapseoperation" class="collapse @if(request()->is('admin/operation*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Operation Management</h6>
            <a class="collapse-item" href="{{ route('admin.operation.index') }}">View All</a>
            <a class="collapse-item" href="{{ route('admin.operation.create') }}">Add new </a>
        </div>
    </div>
    </li>
   <!-- Nav Item Room Type - Pages Collapse Menu -->
   <li class="nav-item">
    <a class="nav-link @if(!request()->is('admin/roomtype*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseRoomType"
        aria-expanded="true" aria-controls="collapseRoomType">
        <i class="fas fa-fw fa-table"></i>
        <span>Room Type</span>
    </a>
    <div id="collapseRoomType" class="collapse @if(request()->is('admin/roomtype*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Room Type Management</h6>
            <a class="collapse-item" href="{{ route('admin.roomtype.index') }}">View All</a>
            <a class="collapse-item" href="{{ route('admin.roomtype.create') }}">Add new </a>
        </div>
    </div>
    </li>
    <!-- Nav Item Room - Pages Collapse Menu -->
   <li class="nav-item">
    <a class="nav-link @if(!request()->is('admin/rooms*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseroom"
        aria-expanded="true" aria-controls="collapseroom">
        <i class="fas fa-fw fa-table"></i>
        <span>Room</span>
    </a>
    <div id="collapseroom" class="collapse @if(request()->is('admin/rooms*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Room Management</h6>
            <a class="collapse-item" href="{{ route('admin.rooms.index') }}">View All</a>
            <a class="collapse-item" href="{{ route('admin.rooms.create') }}">Add new </a>
        </div>
    </div>
    </li>
    <hr class="sidebar-divider">
    <!-- Nav Item Degree - Pages Collapse Menu -->
   <li class="nav-item">
    <a class="nav-link @if(!request()->is('admin/degree*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseDegree"
        aria-expanded="true" aria-controls="collapseDegree">
        <i class="fas fa-fw fa-table"></i>
        <span>Degree</span>
    </a>
    <div id="collapseDegree" class="collapse @if(request()->is('admin/degree*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Degree Management</h6>
            <a class="collapse-item" href="{{ route('admin.degree.index') }}">View All</a>
            <a class="collapse-item" href="{{ route('admin.degree.create') }}">Add new </a>
        </div>
    </div>
    </li>
    <!-- Nav Item Speciality - Pages Collapse Menu -->
   <li class="nav-item">
    <a class="nav-link @if(!request()->is('admin/speciality*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseSpeciality"
        aria-expanded="true" aria-controls="collapseSpeciality">
        <i class="fas fa-fw fa-table"></i>
        <span>Speciality</span>
    </a>
    <div id="collapseSpeciality" class="collapse @if(request()->is('admin/speciality*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Speciality Management</h6>
            <a class="collapse-item" href="{{ route('admin.speciality.index') }}">View All</a>
            <a class="collapse-item" href="{{ route('admin.speciality.create') }}">Add new </a>
        </div>
    </div>
    </li>
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