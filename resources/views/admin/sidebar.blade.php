<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light " style="background-color:#f5f1f7;"id="sidenav-main" >
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand pt-0" href="{{ route('admin.home') }}">
              <img src="{{ asset('argon') }}/img/brand/contoh.png" class="navbar-brand-img img-fluid" width="250" height="575">
            </a>
          </div>
    
        <!-- User -->
        <ul class="nav align-items-center d-md-none" >
            <li class="nav-item dropdown" >
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" >
                    <div class=" dropdown-header noti-title" >
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('admin.profile.edit') }}" class="dropdown-item" >
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('admin.students.index') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
          
            <!-- Navigation -->
            <ul class="navbar-nav" style="background-color:#f5f1f7;" >
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-paper-diploma" style="color: #0d1313;"></i>
                        <span class="nav-link-text" style="color: #0d1313;">{{ __('Manage Students') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <!-- by default, admin home page goes to DCS student list -->
                                <a class="nav-link" href="{{ route('admin.students.index') }}" style="color: #042b2b;">
                                    {{ __('TDCS 3124') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item" style="background-color:#f5f1f7;">
                    <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-circle-08" style="color: #0d1313;"></i>
                        <span class="nav-link-text" style="color: #0d1313;">{{ __('Manage Lecturers') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item" >
                                <a class="nav-link" href="{{ route('admin.lecturers.create') }}" style="color: #042b2b;">
                                    {{ __('Lecturer Registration') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.lecturers.index') }}" style="color: #042b2b;">
                                    {{ __('Lecturers List') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
               
            </ul>
        </div>
    </div>
</nav>
