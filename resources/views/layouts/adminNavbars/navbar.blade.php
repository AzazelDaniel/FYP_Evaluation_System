@auth()
    @include('layouts.adminNavbars.navs.auth')
@endauth
    
@guest()
    @include('layouts.adminNavbars.navs.guest')
@endguest