<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>BC</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>ABC</b>Simple</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

               <!-- <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ Gravatar::get($user->email) }}" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>-->

                    <li>
                        <a href="{{ url('/logout') }}" class="dropdown"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            Cerrar sesion
                        </a>
                    </li>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" >
                        {{ csrf_field() }}
                        <input type="submit" value="logout" style="display: none;">
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>
