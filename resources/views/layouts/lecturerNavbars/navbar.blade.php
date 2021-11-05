@auth()
    @include('layouts.lecturerNavbars.navs.auth')
@endauth
    
@guest()
    @include('layouts.lecturerNavbars.navs.guest')
@endguest