<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-uppercase d-none d-lg-inline-block" style="color: #0d1313;" href="{{ route('lecturer.supervisor.index') }}" >{{ __('Evaluate Students') }}</a>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold" style="color: #0d1313;">Welcome! {{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Manage Account') }}</h6>
                    </div>
                    <a href="{{ route('lecturer.profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="return logout(event);";
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>

                    <script type="text/javascript">
                        function logout(event){
                                event.preventDefault();
                                var check = confirm("Do you really want to logout?");
                                if(check){ 
                                   document.getElementById('logout-form').submit();
                                }
                         }
                    </script>
                </div>
            </li>
        </ul>
    </div>
</nav>