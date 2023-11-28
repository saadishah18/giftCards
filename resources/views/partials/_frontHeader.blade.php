<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row bg-user-color">
    <div class="text-center d-flex align-items-center justify-content-center">
        <a class="navbar-brand" href="{{url('/')}}"></a>
        <a class="navbar-brand brand-logo-mini" href="{{url('/')}}"><img src="{{asset('assets/images/logo1.png')}}" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a href="{{route('register')}}" class="btn user-button mb-2 mx-sm-3 ">Try TickLink ></a>
            </li>

            <li class="nav-item nav-logout d-none d-lg-block">
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
            </li>
        </ul>
    </div>
</nav>
