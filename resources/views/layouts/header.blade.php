<body class="skin-blue">
    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">CSH</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">Club Saint Hubert </span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->


            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                        @if (Auth::user()->isAdmin())
                            <li class="text-center bordered">
                                <a href="{{ route('register') }}" >Nouvel utilsateur</a>
                            </li>
                        @endif
                            <li class="text-center bordered">
                                <a href="{{ route('password') }}" >Changer de mot de passe</a>
                            </li>

                            <li role="separator" class="divider"></li>

                            <li class="text-center">
                                <a href="{{ route('logout') }}"  >Déconnexion</a>
                            </li>

                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                </ul>
            </div>
        </nav>
    </header>
</body>
