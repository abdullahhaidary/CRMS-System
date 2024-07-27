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
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="theme-toggle d-flex  gap-4 align-items-center ">
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
                               {{__('Language')}}
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
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                            </path>
                        </svg>
                    </div>
                    <div class="sidebar-toggler  x">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title font-extrabold" style="user-select: none;" >
                        <div class="logo">
{{--                            <h4><a href="{{route('home')}}">{{Auth::user()->name}}</a></h4>--}}
                        </div>
                    </li>

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
                        @can('super_admin')
                     <li
                            class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-shield-lock"></i>
                                <span>{{__('admin_part')}}</span>
                            </a>
                            <ul class="submenu {{ Route::currentRouteName() == 'crimnal' ? 'active' : '' }}">
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
                            </ul>
                        </li>
                        @endcan
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
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
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



