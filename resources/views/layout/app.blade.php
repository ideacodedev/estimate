@include('layout.head')

<body>
    <div class="loader"></div>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ route('index') }}" class="app-brand-link">
                        <img src="{{ asset('resources/img/logo.png') }}" width="20%" alt="">
                        <span class="app-brand-text demo menu-text fw-bolder ms-3">
                            <font class="text-primary">IT</font>
                            <font class="text-warning">Evaluate</font>
                        </span>
                    </a>
                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>
                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    <li class="menu-item {{ request()->is('index') ? 'active' : '' }}">
                        <a href="{{ route('index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">หน้าหลัก</div>
                        </a>
                    </li>
                    @include('layout.menu_admin')
                    @include('layout.menu_stu')
                </ul>
            </aside>
            <div class="layout-page">
                <nav class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center text-primary">
                                <i class="fa-solid fa-earth-europe fs-4 lh-0"></i>
                                &nbsp;&nbsp;
                                <font style="font-size: 18px">{{ title() }}</font>
                            </div>
                        </div>
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('resources/img/admin.png') }}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('resources/img/admin.png') }}" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    @if (auth()->check())
                                                        <span class="fw-semibold d-block">
                                                            {{ auth()->user()->admin_firstname }}
                                                        </span>
                                                        <small class="text-muted">
                                                            สถานะ: ผู้ดูแลระบบ
                                                        </small>
                                                    @elseif(auth()->guard('officers')->check())
                                                        <span class="fw-semibold d-block">
                                                            {{ auth()->guard('officers')->user()->officer_firstname }}
                                                        </span>
                                                        <small class="text-muted">
                                                            สถานะ: เจ้าหน้าที่
                                                        </small>
                                                    @elseif(auth()->guard('students')->check())
                                                        <span class="fw-semibold d-block">
                                                            {{ auth()->guard('students')->user()->student_firstname }}
                                                        </span>
                                                        <small class="text-muted">
                                                            สถานะ: นักศึกษา
                                                        </small>
                                                    @elseif(auth()->guard('lecs')->check())
                                                        <span class="fw-semibold d-block">
                                                            {{ auth()->guard('lecs')->user()->lecturer_firstname }}
                                                        </span>
                                                        <small class="text-muted">
                                                            สถานะ: อาจารย์
                                                        </small>
                                                    @endif

                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    {{-- <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">ข้อมูลส่วนตัว</span>
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a class="dropdown-item logout" href="{{ route('logout') }}">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">ออกจากระบบ</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                        <footer class="content-footer footer bg-footer-theme">
                            <div
                                class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                                <div class="mb-2 mb-md-0">
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    , {{ title() }}
                                </div>
                            </div>
                        </footer>
                        <div class="content-backdrop fade"></div>
                    </div>
                </div>
            </div>
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        @include('layout.script')
    </div>

</body>

</html>
@include('layout.alert')
