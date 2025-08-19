<header class="main-header">

    <!-- Logo -->
    <a href="{{route('web.dashboard.index')}}" class="logo" 
    style="display:flex;align-items:center;justify-content:center;
            gap:8px;height:50px;background:#3c8dbc;text-decoration:none;">
        
        <!-- Logo image -->
        <img src="{{ asset('img/SIK.png') }}" alt="Logo" 
            style="height:32px;width:32px;object-fit:contain;">
        
        <!-- Logo text -->
        <span class="logo-lg" 
            style="font-size:13px;font-weight:700;color:#0001ee;white-space:nowrap;">
            PT. SUMI INDO KABEL Tbk.
        </span>
    </a>


    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ Auth::user()->photo != null ? url(Auth::user()->photo) : asset('/img/account.png') }}" 
                             class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header text-center">
                            <img src="{{ Auth::user()->photo != null ? url(Auth::user()->photo) : asset('img/account.png') }}" 
                                class="img-circle" alt="User Image">
                            <p class="mt-2">{{ Auth::user()->name }}</p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="{{route('web.auth.signout')}}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>
</header>
