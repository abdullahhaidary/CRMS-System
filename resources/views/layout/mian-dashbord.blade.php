<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criminal Manegment system</title>

    <link rel="stylesheet" href="{{@asset('dist2/css/app-dark.rtl.css')}}">
    <link rel="stylesheet" href="{{@asset('dist2/css/app.rtl.css')}}">
    <link rel="stylesheet" href="{{@asset('dist2/css/iconly.css')}}">

    <link rel="stylesheet" href="{{@asset('dist2/css/style.css')}}">

    <link rel="shortcut icon" href="{{@asset('./dist2/css/svg/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{@asset('dist2/css/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/font-awsome.css')}}">

</head>
<body dir="rtl">
<script src="{{@asset('dist2/js/initTheme.js')}}"></script>
<div id="app">
    <div id="sidebar">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header position-relative">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <!-- <a href="index.html"><img src="./asit/css/svg/logo.svg" alt="Logo" srcset=""></a> -->
                        <div class="">
                            <div class="">
{{--                                <img src="asit/img/RK.jpg" width="70px" height="60px" alt="">--}}
                                <h4><a href="{{route('home')}}">{{Auth::user()->name}}</a></h4>
                            </div>

                        </div>
                    </div>
                    <div class="theme-toggle d-flex  gap-2 align-items-center mt-0 ">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                             role="img" class="iconify iconify--system-uicons" width="20" height="20"
                             preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                            <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                               stroke-linejoin="round">
                            </g>
                        </svg>
                        <div class="dropdown" style="width: 20px;">
                            <i class="bi bi-bell-fill fs-5" id="notificationDropdown"
                               data-bs-toggle="dropdown" aria-expanded="false" style="color: #bb5454"></i>
                            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" aria-labelledby="notificationDropdown">
                                <li><span class="dropdown-item dropdown-header">15 Notifications</span></li>
                                <li><div class="dropdown-divider"></div></li>
                                <li><a href="#" class="dropdown-item">
                                     8 friend requests
                                    </a></li>
                                <li><div class="dropdown-divider"></div></li>
                                <li><a href="#" class="dropdown-item dropdown-footer">See All Notifications</a></li>
                                <li><div class="dropdown-divider"></div></li>
                            </ul>
                        </div>
                        <button class="btn btn-outline-primary btn-sm mt-1 dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            زبان
                        </button>
                        <ul class="dropdown-menu dropdown-menu-sm-end" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item" href="{{url('language/pashto')}}" data-lang="en">پښتو</a></li>
                            <li><a class="dropdown-item" href="{{url('language/dari')}}" data-lang="es">فارسی</a></li>
                            <li><a class="dropdown-item" href="{{url('language/english')}}" data-lang="fr">English</a></li>
                            <!-- Add more languages as needed -->
                        </ul>
                        <div class="form-check form-switch fs-6">
                            <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                            <label class="form-check-label"></label>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                             role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet"
                             viewBox="0 0 24 24">
                        </svg>
                    </div>
                    <div class="sidebar-toggler  x">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">

                <ul class="menu">
                    <li class="sidebar-title font-extrabold" style="user-select: none;" >{{__('management_system')}} </li>
                    <li
                        class="sidebar-item {{ request()->is('/') ? 'active' : '' }}">
                        <a href="{{url('/')}}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>{{__('Dashboard')}}</span>
                        </a>
                    </li>
                    @if(Gate::any(['admin', 'super_admin']))
                    <li
                        class="sidebar-item has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>{{__('part_of_system')}}</span>
                        </a>
                        <ul class="submenu {{ Route::currentRouteName() == 'crimnal' ? 'active' : '' }}">
                            <li class="submenu-item  {{ Route::currentRouteName() == 'crimnal' ? 'active' : '' }}">
                                <a href="{{route('crimnal')}}" class="submenu-link ">{{__('crime_part')}}</a>
                            </li>
                            <li class="submenu-item  ">
                                <a href="component-alert.html" class="submenu-link">اسناد ها</a>
                            </li>
                            <li class="submenu-item  ">
                                <a href="all-emplayee.html" class="submenu-link">کارمندان عمومی</a>
                            </li>
                            <li class="submenu-item  ">
                                <a href="component-badge.html" class="submenu-link">زندان</a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="sidebar-item   {{ Route::currentRouteName() == 'search' ? 'active' : '' }}">
                        <a href="{{route('search')}}" class='sidebar-link'>
                            <i class="bi bi-search"></i>
                            <span>{{__('public_search')}}</span>
                        </a>
                    </li>
                    <li
                            class="sidebar-item {{ Route::currentRouteName() == 'people' ? 'active' : '' }}">
                            <a href="{{route('people')}}" class='sidebar-link '>
                                <i class="bi-file-earmark-text"></i>
                                <span>{{__('save_compelint')}}</span>
                            </a>
                        </li>
                    <li
                        class="sidebar-item">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-shield-lock"></i>
                            <span>{{__('admin_part')}}</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item   {{ Route::currentRouteName() == 'department' ? 'active' : '' }}">
                        <a href="{{route('department')}}" class='sidebar-link'>
                            <i class="bi bi-building"></i>
                            <span>{{__('department')}} </span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item {{ Route::currentRouteName() == 'bio_search' ? 'active' : '' }} ">
                        <a href="{{route('bio_search')}}" class='sidebar-link '>
                            <i class="bi bi-search"></i>
                            <span>{{__('biemitrec_search')}} </span>
                        </a>
                    </li>
                    @endif
                    @can('super_admin')
                    <li
                        class="sidebar-item  {{ Route::currentRouteName() == 'register' ? 'active' : '' }} ">
                        <a href="{{route('register')}}" class='sidebar-link'>
                            <i class="bi bi-people-fill"></i>
                            <span>{{__('users')}}  </span>
                        </a>
                    </li>
                        <li
                            class="sidebar-item  {{ Route::currentRouteName() == 'register' ? 'active' : '' }} ">
                            <a href="{{route('province_account')}}" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Account province</span>
                            </a>
                        </li>

                        @endcan
                    @can('moder')
                        <li
                            class="sidebar-item {{ Route::currentRouteName() == 'profile_info' ? 'active' : '' }} ">
                            <a href="{{route('province_list')}}" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span> ثبت شکایت </span>
                            </a>
                        </li>
                    @endcan
                    <li
                        class="sidebar-item {{ Route::currentRouteName() == 'profile_info' ? 'active' : '' }} ">
                        <a href="{{route('profile_info')}}" class='sidebar-link'>
                            <i class="bi bi-person-fill"></i>
                            <span>{{__('my_profile')}} </span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item">
                        <a href="" class='sidebar-link'>
{{--                            <i class="bi bi-door-open"></i>--}}
                        <form action="{{route('logout')}}" method="post">
                            @csrf
        <button class="btn " style="background-color: #6c3b3b; color: #ffffff" type="submit">{{__('logout')}}</button>
    </form>
{{--0765470099--}}
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <div id="main">

      @yield('content')
    </div>
</div>



<script src="{{@asset('dist2/js/component/dark.js')}}"></script>
<script src="{{@asset('dist2/static/component/perfect-scrollbar.min.js')}}"></script>


<script src="{{@asset('dist2/js/app.js')}}"></script>



<!-- Need: Apexcharts -->
<script src="{{@asset('dist2/js/apexcharts.min.js')}}"></script>
<script src="{{@asset('dist2/js/dashboard.js')}}"></script>

</body>
</html>



