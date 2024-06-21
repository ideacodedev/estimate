@if (auth()->check())
    <li class="menu-item {{ request()->is('officer') ? 'active' : '' }}">
        <a href="{{ route('officer') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-user-secret"></i>
            <div data-i18n="Analytics">ข้อมูลเจ้าหน้าที่</div>
        </a>
    </li>
@endif
@if (auth()->guard('officers')->check() or auth()->check())
    <li class="menu-item {{ request()->is('lecturer') ? 'active' : '' }}">
        <a href="{{ route('lecturer') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-user-tie"></i>
            <div data-i18n="Analytics">ข้อมูลอาจารย์</div>
        </a>
    </li>
    <li class="menu-item {{ request()->is('student') ? 'active' : '' }}">
        <a href="{{ route('student') }}" class="menu-link">
            <i class="menu-icon fa-solid fa-user-graduate"></i>
            <div data-i18n="Analytics">ข้อมูลนักศึกษา</div>
        </a>
    </li>
    @if (auth()->guard('officers')->check())
        <li class="menu-item {{ request()->is('at_title', 'at_record') ? 'active open' : '' }}" style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="ข้อมูลแบบประเมิน">ข้อมูลแบบประเมิน</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('at_title') ? 'active' : '' }}">
                    <a href="{{ route('at_title') }}" class="menu-link">
                        <div data-i18n="ข้อมูลห้อง">หัวข้อแบบประเมิน</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('at_record') ? 'active' : '' }}">
                    <a href="{{ route('at_record') }}" class="menu-link">
                        <div data-i18n="ข้อมูลห้อง">ประวัติการประเมิน</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->is('report') ? 'active' : '' }}">
            <a href="{{ route('report') }}" class="menu-link">
                <i class="menu-icon fa-solid fa-chart-pie"></i>
                <div data-i18n="Analytics">รายงาน</div>
            </a>
        </li>
    @endif
    <li class="menu-item {{ request()->is('room', 'building', 'ed', 'ed_type') ? 'active open' : '' }}" style="">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-dock-top"></i>
            <div data-i18n="ข้อมูลพื้นฐาน">ข้อมูลพื้นฐาน</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ request()->is('room') ? 'active' : '' }}">
                <a href="{{ route('room') }}" class="menu-link">
                    <div data-i18n="ข้อมูลห้อง">ข้อมูลห้อง</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('building') ? 'active' : '' }}">
                <a href="{{ route('building') }}" class="menu-link">
                    <div data-i18n="ข้อมูลอาคาร">ข้อมูลอาคาร</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('ed') ? 'active' : '' }}">
                <a href="{{ route('ed') }}" class="menu-link">
                    <div data-i18n="ข้อมูลอาคาร">ข้อมูลอุปกรณ์อิเล็กทรอนิกส์</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('ed_type') ? 'active' : '' }}">
                <a href="{{ route('ed_type') }}" class="menu-link">
                    <div data-i18n="ข้อมูลอาคาร">ข้อมูลประเภทอุปกรณ์อิเล็กทรอนิกส์</div>
                </a>
            </li>
        </ul>
    </li>
@endif
