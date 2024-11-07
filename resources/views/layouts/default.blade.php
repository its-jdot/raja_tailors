{{-- resources/views/layouts/app.blade.php --}}

@php
    $appDescription = __('Raja Taitors & Collection');
@endphp


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $appDescription }} : @yield('title')</title>

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    {{-- BEGIN GLOBAL MANDATORY STYLES --}}
    <link href="{{ asset('css/fontgoogleapicom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- END GLOBAL MANDATORY STYLES --}}

    {{-- BEGIN PAGE LEVEL PLUGINS --}}
    <link href="{{ asset('assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/global/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <link href="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- END PAGE LEVEL PLUGINS --}}

    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/jstree/dist/themes/default/style.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ asset('assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    {{-- BEGIN THEME GLOBAL STYLES --}}
    <link href="{{ asset('assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ asset('assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- END THEME GLOBAL STYLES --}}
    
    <link href="{{ asset('assets/pages/css/profile.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- BEGIN THEME LAYOUT STYLES --}}
    <link href="{{ asset('assets/layouts/layout3/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/layouts/layout3/css/layout.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/layouts/layout3/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ asset('assets/layouts/layout3/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- END THEME LAYOUT STYLES --}}

    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/additional-methods.min.js') }}"></script>

    @yield('meta')
</head>
<body class="page-container-bg-solid page-boxed">
    {{-- BEGIN HEADER --}}
    <div class="page-header">
        {{-- BEGIN HEADER TOP --}}
        <div class="page-header-top">
            <div class="container">
                {{-- BEGIN LOGO --}}
                <div class="page-logo">
                    <a href="{{ url('/users/deshboard') }}">
                        <img src="{{ asset('img/logo.png') }}" height="75" width="100" alt="Rajatailors" />
                    </a>
                </div>
                {{-- END LOGO --}}

                {{-- BEGIN RESPONSIVE MENU TOGGLER --}}
                <a href="javascript:;" class="menu-toggler"></a>
                {{-- END RESPONSIVE MENU TOGGLER --}}

                {{-- BEGIN TOP NAVIGATION MENU --}}
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown dropdown-user dropdown-dark">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="{{ asset('img/user_profile_male.jpg') }}">
                                <span class="username username-hide-mobile">
                                    @if (Session::has('Auth.User'))
                                        {{ Session::get('Auth.User.username') }}
                                    @endif
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-lock"></i> Lock Screen </a>
                                </li>
                                <li>
                                    <a href="{{ url('/users/logout') }}">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                {{-- END TOP NAVIGATION MENU --}}
            </div>
        </div>
        {{-- END HEADER TOP --}}

        {{-- BEGIN HEADER MENU --}}
        <div class="page-header-menu">
            <div class="container">
                <div class="hor-menu">
                    <ul class="nav navbar-nav">
                        <li class="menu-dropdown classic-menu-dropdown active">
                            <a href="{{ url('/users/deshboard') }}"> Dashboard
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="menu-dropdown classic-menu-dropdown">
                            <a href="javascript:;"> Setup
                                <span class="arrow"></span>
                            </a>
                            <ul class="dropdown-menu pull-left">
                                <li class="dropdown-submenu">
                                    <a href="javascript:;" class="nav-link nav-toggle"> User Management
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ url('/users/index') }}" class="nav-link"> Users</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/usersettings/settings') }}" class="nav-link"> User Roles </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="javascript:;" class="nav-link nav-toggle"> Developers
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ url('/acos/index') }}" class="nav-link"> Functions </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/usersettings/aros_acos') }}" class="nav-link"> Assign User Functions </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="javascript:;" class="nav-link nav-toggle"> Location
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ url('/countries/index') }}" class="nav-link">Countries </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ url('/smstemplates/index') }}" class="nav-link nav-toggle"> SMS Template</a>
                                </li>
                                <li>
                                    <a href="{{ url('/brandrates/index') }}" class="nav-link nav-toggle"> Brands & Rates</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-dropdown classic-menu-dropdown">
                            <a href="javascript:;"> My Shop
                                <span class="arrow"></span>
                            </a>
                            <ul class="dropdown-menu pull-left">
                                <li>
                                    <a href="{{ url('/products/index') }}" class="nav-link"> Products </a>
                                </li>
                                <li>
                                    <a href="{{ url('/customers/index') }}" class="nav-link"> Customers </a>
                                </li>
                                <li>
                                    <a href="{{ url('/orders/index') }}" class="nav-link"> Orders </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- END HEADER MENU --}}
    </div>
    {{-- END HEADER --}}

    {{-- BEGIN CONTENT --}}
    <div class="page-container">
        <div class="page-content-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
    </div>
    {{-- END CONTENT --}}

    {{-- BEGIN FOOTER --}}
    <div class="page-footer">
        <div class="container"> 2024 &copy; {{ $appDescription }}. All Rights Reserved. </div>
    </div>
    {{-- END FOOTER --}}

    {{-- BEGIN CORE PLUGINS --}}
    <script src="{{ asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
    {{-- END CORE PLUGINS --}}

    {{-- BEGIN PAGE LEVEL PLUGINS --}}
    <script src="{{ asset('assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/morris/raphael-min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jstree/dist/jstree.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    {{-- END PAGE LEVEL PLUGINS --}}

    {{-- BEGIN THEME GLOBAL SCRIPTS --}}
    <script src="{{ asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
    {{-- END THEME GLOBAL SCRIPTS --}}

    {{-- BEGIN PAGE LEVEL SCRIPTS --}}
    <script src="{{ asset('assets/pages/scripts/profile.min.js') }}" type="text/javascript"></script>
    {{-- END PAGE LEVEL SCRIPTS --}}

    @yield('scripts')
</body>
</html>
