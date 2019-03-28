<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Bootstrap Admin App">
    <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>VOST</title>
    {{--<!-- =============== VENDOR STYLES ===============-->
    <!-- SIMPLE LINE ICONS-->
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
    <!-- ANIMATE.CSS-->
    <link rel="stylesheet" href="vendor/animate.css/animate.css">
    <!-- WHIRL (spinners)-->
    <link rel="stylesheet" href="vendor/whirl/dist/whirl.css">
    <!-- =============== PAGE VENDOR STYLES ===============-->
    <!-- WEATHER ICONS-->
    <link rel="stylesheet" href="vendor/weather-icons/css/weather-icons.css">--}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
<div class="wrapper">
    <!-- top navbar-->
    <header class="topnavbar-wrapper">
        <!-- START Top Navbar-->
        <nav class="navbar topnavbar">
            <!-- START navbar header-->
            <div class="navbar-header">
                <a class="navbar-brand" href="#/">
                    <div class="brand-logo">
                        {{--<img class="img-fluid" src="https://vost.pt/wp-content/uploads/2018/11/VOSTPT_LETTERING_GRAYSCALE-1024x614.png" alt="">
                        --}}
                        <span style="color: black; text-decoration: none;">VOST.PT</span>
                    </div>
                    <div class="brand-logo-collapsed">
                        VOST
                    </div>
                </a>
            </div>
            <!-- END navbar header-->
            {{--<!-- START Left navbar-->
            <ul class="navbar-nav mr-auto flex-row">
                <li class="nav-item">
                    <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                    <a class="nav-link d-none d-md-block d-lg-block d-xl-block" href="#" data-trigger-resize="" data-toggle-state="aside-collapsed">
                        <em class="fas fa-bars"></em>
                    </a>
                    <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                    <a class="nav-link sidebar-toggle d-md-none" href="#" data-toggle-state="aside-toggled" data-no-persist="true">
                        <em class="fas fa-bars"></em>
                    </a>
                </li>
                <!-- START User avatar toggle-->
                <li class="nav-item d-none d-md-block">
                    <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                    <a class="nav-link" id="user-block-toggle" href="#user-block" data-toggle="collapse">
                        <em class="icon-user"></em>
                    </a>
                </li>
                <!-- END User avatar toggle-->
                <!-- START lock screen-->
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="lock.html" title="Lock screen">
                        <em class="icon-lock"></em>
                    </a>
                </li>
                <!-- END lock screen-->
            </ul>
            <!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class="navbar-nav flex-row">
                <!-- Search icon-->
                <li class="nav-item">
                    <a class="nav-link" href="#" data-search-open="">
                        <em class="icon-magnifier"></em>
                    </a>
                </li>
                <!-- Fullscreen (only desktops)-->
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="#" data-toggle-fullscreen="">
                        <em class="fas fa-expand"></em>
                    </a>
                </li>
                <!-- START Alert menu-->
                <li class="nav-item dropdown dropdown-list">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-toggle="dropdown">
                        <em class="icon-bell"></em>
                        <span class="badge badge-danger">11</span>
                    </a>
                    <!-- START Dropdown menu-->
                    <div class="dropdown-menu dropdown-menu-right animated flipInX">
                        <div class="dropdown-item">
                            <!-- START list group-->
                            <div class="list-group">
                                <!-- list item-->
                                <div class="list-group-item list-group-item-action">
                                    <div class="media">
                                        <div class="align-self-start mr-2">
                                            <em class="fab fa-twitter fa-2x text-info"></em>
                                        </div>
                                        <div class="media-body">
                                            <p class="m-0">New followers</p>
                                            <p class="m-0 text-muted text-sm">1 new follower</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- list item-->
                                <div class="list-group-item list-group-item-action">
                                    <div class="media">
                                        <div class="align-self-start mr-2">
                                            <em class="fas fa-envelope fa-2x text-warning"></em>
                                        </div>
                                        <div class="media-body">
                                            <p class="m-0">New e-mails</p>
                                            <p class="m-0 text-muted text-sm">You have 10 new emails</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- list item-->
                                <div class="list-group-item list-group-item-action">
                                    <div class="media">
                                        <div class="align-self-start mr-2">
                                            <em class="fas fa-tasks fa-2x text-success"></em>
                                        </div>
                                        <div class="media-body">
                                            <p class="m-0">Pending Tasks</p>
                                            <p class="m-0 text-muted text-sm">11 pending task</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- last list item-->
                                <div class="list-group-item list-group-item-action">
                              <span class="d-flex align-items-center">
                                 <span class="text-sm">More notifications</span>
                                 <span class="badge badge-danger ml-auto">14</span>
                              </span>
                                </div>
                            </div>
                            <!-- END list group-->
                        </div>
                    </div>
                    <!-- END Dropdown menu-->
                </li>
                <!-- END Alert menu-->
                <!-- START Offsidebar button-->
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle-state="offsidebar-open" data-no-persist="true">
                        <em class="icon-notebook"></em>
                    </a>
                </li>
                <!-- END Offsidebar menu-->
            </ul>
            <!-- END Right Navbar-->
            <!-- START Search form-->
            <form class="navbar-form" role="search" action="search.html">
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Type and hit enter ...">
                    <div class="fas fa-times navbar-form-close" data-search-dismiss=""></div>
                </div>
                <button class="d-none" type="submit">Submit</button>
            </form>
            <!-- END Search form-->--}}
        </nav>
        <!-- END Top Navbar-->
    </header>
    <!-- sidebar-->
    <aside class="aside-container">
        <!-- START Sidebar (left)-->
        <div class="aside-inner">
            <nav class="sidebar" data-sidebar-anyclick-close="">
                <!-- START sidebar nav-->
                <ul class="sidebar-nav">
                    <!-- Iterates over all sidebar items-->
                    <li class="nav-heading">
                        <span>Principal</span>
                    </li>
                    {{--<li class="">
                        <a href="#about-us" title="Sobre nós">
                            <i class="fa fa-info fa-fw"></i>
                            <span>Sobre nós</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#ocorrencias" title="Ocorrências">
                            <i class="fa fa-fw fa-map-marker"></i>
                            <span>Ocorrências</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="#news" title="Notícias">
                            <i class="fa fa-newspaper-o fa-fw"></i>
                            <span>Notícias</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#volunteers" title="Voluntários">
                            <i class="fa fa-user fa-fw"></i>
                            <span>Voluntários</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#contact" title="Contactos">
                            <i class="fa fa-phone fa-fw"></i>
                            <span>Contactar</span>
                        </a>
                    </li>--}}

                    @if (! \Auth::guest())
                        <li class="nav-heading">
                            <span>Interno</span>
                        </li>
                        <li>
                            <a href="{{ route('admin.index') }}">
                                <i class="fa fa-fw fa-home"></i>
                                <span>Principal</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('admin.occurrences.index') }}" title="Ocorrências">
                                <i class="fa fa-fw fa-map-marker"></i>
                                <span>Ocorrências</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('admin.users.index') }}" title="Utilizadores">
                                <i class="fa fa-fw fa-users"></i>
                                <span>Utilizadores</span>
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}">
                                <i class="fa fa-fw fa-lock"></i>
                                <span>Entrada na plataforma</span>
                            </a>
                        </li>
                    @endif
                </ul>
                <!-- END sidebar nav-->
            </nav>
        </div>
        <!-- END Sidebar (left)-->
    </aside>
    <!-- Main section-->
    <section class="section-container">
        <!-- Page content-->
        <div class="content-wrapper">
            @yield('content')
        </div>
    </section>
    <!-- Page footer-->
    <footer>
        <span>&copy; 2019 - Angle</span>
    </footer>
</div>

{{--
<!-- =============== VENDOR SCRIPTS ===============-->
<!-- MODERNIZR-->
<script src="vendor/modernizr/modernizr.custom.js"></script>
<!-- STORAGE API-->
<script src="vendor/js-storage/js.storage.js"></script>
<!-- SCREENFULL-->
<script src="vendor/screenfull/dist/screenfull.js"></script>
<!-- i18next-->
<script src="vendor/i18next/i18next.js"></script>
<script src="vendor/i18next-xhr-backend/i18nextXHRBackend.js"></script>
<script src="vendor/jquery/dist/jquery.js"></script>
<script src="vendor/popper.js/dist/umd/popper.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap_old.js"></script>
<!-- =============== PAGE VENDOR SCRIPTS ===============-->
<!-- SPARKLINE-->
<script src="vendor/jquery-sparkline/jquery.sparkline.js"></script>
<!-- FLOT CHART-->
<script src="vendor/flot/jquery.flot.js"></script>
<script src="vendor/jquery.flot.tooltip/js/jquery.flot.tooltip.js"></script>
<script src="vendor/flot/jquery.flot.resize.js"></script>
<script src="vendor/flot/jquery.flot.pie.js"></script>
<script src="vendor/flot/jquery.flot.time.js"></script>
<script src="vendor/flot/jquery.flot.categories.js"></script>
<script src="vendor/jquery.flot.spline/jquery.flot.spline.js"></script>
<!-- EASY PIE CHART-->
<script src="vendor/easy-pie-chart/dist/jquery.easypiechart.js"></script>
<!-- MOMENT JS-->
<script src="vendor/moment/min/moment-with-locales.js"></script>
<!-- =============== APP SCRIPTS ===============-->
<script src="js/app.js"></script> --}}
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts_footer')
</body>

</html>