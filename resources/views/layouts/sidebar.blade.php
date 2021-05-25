<nav class="sidebar sidebar-offcanvas" id="sidebar">

    <ul class="nav">
        <li class="nav-item nav-profile">
          <a href="#" class="nav-link">
            <div class="nav-profile-image">
              <img src="{{ asset('assets/images/faces/person.jpg') }}" alt="profile">
              <span class="login-status online"></span>
              <!--change to offline or busy as needed-->
            </div>
            <div class="nav-profile-text d-flex flex-column">
              <span class="font-weight-bold mb-2">  {{ Auth::user()->name }} </span>
              <span class="text-secondary text-small">Project Manager</span>
            </div>
            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/home') }}">
            <span class="menu-title">Dashboard</span>
            <i class="mdi mdi-home menu-icon"></i>
          </a>
        </li>
        @hasrole('superadmin')
        <li class="nav-item">
            <a href="{{ url('/superadmin2') }}" class="nav-link" href="calendar">
              <span class="menu-title">Manage Accounts</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <i class="mdi mdi-account-multiple-plus"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">Category</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-note-outline menu-icon"></i>
            </a>

            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="{{ url('/facilitycat') }}">FAcility Category</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/vehiclecat') }}">Vehicle Category</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/equipmentcat') }}">Equipment Category</a></li>

              </ul>
            </div>
          </li>

         @endhasrole


          @hasrole('staff')
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
            <span class="menu-title">Reservation</span>
            <i class="menu-arrow"></i>
            <i class="mdi mdi-pen menu-icon"></i>
          </a>
          <div class="collapse" id="general-pages">
            <ul class="nav flex-column sub-menu">

              <li class="nav-item"> <a class="nav-link" href="{{ url('/facilities') }}"> Facility Reservation </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{ url('/vrs') }}"> Vehicle Reservation </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{ url('/zooms') }}"> Zoom Reservation </a></li>
            </ul>
          </div>
        </li>

        @endhasrole
        @hasrole('admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/adminveh') }}">
              <span class="menu-title">Vehicle Reservation</span>
              <i class=" mdi mdi-pen menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/adminfac') }}">
              <span class="menu-title">Facility Reservation</span>
              <i class=" mdi mdi-pen menu-icon"></i>
            </a>
          </li>


          @endhasrole





          @hasrole('driver')
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/vehicles') }}">
              <span class="menu-title">Vehicle Reservation</span>
              <i class=" mdi mdi-pen menu-icon"></i>
            </a>
          </li>

          @endhasrole

        @hasrole('superadmin')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages3" aria-expanded="false" aria-controls="general-pages3">
              <span class="menu-title">Calendars</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-settings-box menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages3">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('/calendar') }}"> Vehicle Calendar </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/calendarfac') }}"> Facility Calendar </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/adminzoom') }}"> Zoom Reservation </a></li>


              </ul>
            </div>
          </li>
          @endhasrole
      </ul>


    </nav>
