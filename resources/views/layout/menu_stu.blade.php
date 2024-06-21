@if (auth()->guard('students')->check() or auth()->guard('lecs')->check())
    <li class="menu-item {{ request()->is('at') ? 'active' : '' }}">
        <a href="{{ route('at') }}" class="menu-link">
            <i class="menu-icon fa-regular fa-newspaper"></i>
            <div data-i18n="Analytics">แบบประเมิน</div>
        </a>
    </li>
    <li class="menu-item {{ request()->is('at_record') ? 'active' : '' }}">
        <a href="{{ route('at_record') }}" class="menu-link">
            <i class="menu-icon fa-regular fa-folder-open"></i>
            <div data-i18n="Analytics">ประวัติการประเมิน</div>
        </a>
    </li>
@endif
