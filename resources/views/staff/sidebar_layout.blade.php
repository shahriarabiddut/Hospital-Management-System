<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('staff.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15 col-md-4">
            @isset($SiteOption)
            <img src="{{ asset($SiteOption[1]->value) }}" alt="" srcset="" width="100%">
            @endisset
        </div>
        <div class="sidebar-brand-text mx-2 col-md-8">Staff Panel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/staff">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">
    <!-- Heading -->
    @if (Auth::guard('staff')->user()->type == 'doctor')
    <div class="sidebar-heading">
        Specialities
    </div>
    <!-- Nav Email Services - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if (!request()->is('staff/information*'))
            collapsed
        @endif" href="#" data-toggle="collapse" data-target="#collapsespeciality"
            aria-expanded="true" aria-controls="collapsespeciality">
            <i class="fas fa-table"></i>
            <span>Doctor Info</span>
        </a>
        <div id="collapsespeciality" class="collapse @if(request()->is('staff/information*')) show @endif" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Info Management</h6>
                <a class="collapse-item" href="{{ route('staff.information.index') }}">View All</a>
            </div>
        </div>
    </li>
    @endif
    @if (Auth::guard('staff')->user()->type == 'staff')
    <div class="sidebar-heading">
        System Email System
    </div>
    <!-- Nav Email Services - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if (!request()->is('staff/email*'))
            collapsed
        @endif" href="#" data-toggle="collapse" data-target="#collapseFive"
            aria-expanded="true" aria-controls="collapseFive">
            <i class="fas fa-table"></i>
            <span>Email Service</span>
        </a>
        <div id="collapseFive" class="collapse @if(request()->is('staff/email*')) show @endif" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Email Management</h6>
                <a class="collapse-item" href="{{ route('staff.email.index') }}">View All</a>
                <a class="collapse-item" href="{{ route('staff.email.create') }}">Add new</a>
            </div>
        </div>
    </li>
    

     <!-- Nav Item Support - Utilities Collapse Menu -->
     <li class="nav-item">
        <a class="nav-link @if (!request()->is('student/support*'))
            collapsed
        @endif" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-ticket-alt"></i>
            <span>Support</span>
        </a>
        <div id="collapseOne" class="collapse @if(request()->is('staff/support*')) show @endif" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Support Ticket Management</h6>
                <a class="collapse-item" href="{{ route('staff.support.index') }}">View Support Tickets</a>
            </div>
        </div>
    </li>
    <div class="sidebar-heading">
        Patient Management
    </div>
    <!-- Nav Item Patient - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if (!request()->is('student/pateint*'))
            collapsed
        @endif" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-ticket-alt"></i>
            <span>Patient</span>
        </a>
        <div id="collapseTwo" class="collapse @if(request()->is('staff/pateint*')) show @endif" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Patient Management</h6>
                <a class="collapse-item" href="{{ route('staff.patient.index') }}">View All</a>
                <a class="collapse-item" href="{{ route('staff.patient.create') }}">Add new</a>
            </div>
        </div>
    </li>
    <!-- Nav Item Appointment - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if (!request()->is('student/emergency*'))
            collapsed
        @endif" href="#" data-toggle="collapse" data-target="#collapseEmergency"
            aria-expanded="true" aria-controls="collapseEmergency">
            <i class="fas fa-ticket-alt"></i>
            <span>Emergency</span>
        </a>
        <div id="collapseEmergency" class="collapse @if(request()->is('staff/emergency*')) show @endif" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Emergency Management</h6>
                <a class="collapse-item" href="{{ route('staff.emergency.index') }}">View Emergency</a>
            </div>
        </div>
    </li>
    <!-- Nav Item Appointment - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if (!request()->is('staff/appointment*'))
            collapsed
        @endif" href="#" data-toggle="collapse" data-target="#collapseTen"
            aria-expanded="true" aria-controls="collapseTen">
            <i class="fas fa-ticket-alt"></i>
            <span>Appointment</span>
        </a>
        <div id="collapseTen" class="collapse @if(request()->is('staff/appointment*')) show @endif" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Appointment Management</h6>
                <a class="collapse-item" href="{{ route('staff.appointment.index') }}">View Appointments</a>
            </div>
        </div>
    </li>
    <!-- Nav Item LabTest - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if (!request()->is('staff/labtest*'))
            collapsed
        @endif" href="#" data-toggle="collapse" data-target="#collapselabtest"
            aria-expanded="true" aria-controls="collapselabtest">
            <i class="fas fa-ticket-alt"></i>
            <span>LabTest</span>
        </a>
        <div id="collapselabtest" class="collapse @if(request()->is('staff/labtest*')) show @endif" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">LabTest Management</h6>
                <a class="collapse-item" href="{{ route('staff.labtest.index') }}">View LabTests</a>
            </div>
        </div>
    </li>
    <!-- Nav Item Admission - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if (!request()->is('staff/admission*'))
            collapsed
        @endif" href="#" data-toggle="collapse" data-target="#collapseAdmission"
            aria-expanded="true" aria-controls="collapseAdmission">
            <i class="fas fa-ticket-alt"></i>
            <span>Admission</span>
        </a>
        <div id="collapseAdmission" class="collapse @if(request()->is('staff/admission*')) show @endif" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Admission Management</h6>
                <a class="collapse-item" href="{{ route('staff.admission.index') }}">View Admissions</a>
            </div>
        </div>
    </li>
    <!-- Nav Item Operation - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if (!request()->is('staff/operation*'))
            collapsed
        @endif" href="#" data-toggle="collapse" data-target="#collapseOperation"
            aria-expanded="true" aria-controls="collapseOperation">
            <i class="fas fa-ticket-alt"></i>
            <span>Operation</span>
        </a>
        <div id="collapseOperation" class="collapse @if(request()->is('staff/operation*')) show @endif" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Operation Management</h6>
                <a class="collapse-item" href="{{ route('staff.operation.index') }}">View Operations</a>
            </div>
        </div>
    </li>
    <div class="sidebar-heading">
        Bill Management
    </div>
    <!-- Nav Item Bill - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if (!request()->is('staff/bill*'))
            collapsed
        @endif" href="#" data-toggle="collapse" data-target="#collapsebill"
            aria-expanded="true" aria-controls="collapsebill">
            <i class="fas fa-ticket-alt"></i>
            <span>Bill</span>
        </a>
        <div id="collapsebill" class="collapse @if(request()->is('staff/bill*')) show @endif" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Bill Management</h6>
                <a class="collapse-item" href="{{ route('staff.bill.index') }}">View Bills</a>
            </div>
        </div>
    </li>
    
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar - Logout - CopyRight) -->
    @include('../layouts/sidebar_toggle')
    <!-- End Sidebar Toggler (Sidebar - Logout - CopyRight) -->

    

</ul>