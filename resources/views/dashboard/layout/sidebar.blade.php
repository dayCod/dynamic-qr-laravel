<div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="index.html">
        <span class="align-middle">QR Generator</span>
    </a>

    <ul class="sidebar-nav">
        <li class="sidebar-header">
            Pages
        </li>

        <li class="sidebar-item {{ !Request::routeIs('dashboard.index') ? : 'active'  }}">
            <a class="sidebar-link" href="{{ route('dashboard.index') }}">
                <i class="align-middle" data-feather="sliders"></i> <span
                    class="align-middle">Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item {{ !Request::routeIs('dashboard.department.index') ? : 'active' }}">
            <a class="sidebar-link" href="{{ route('dashboard.department.index') }}">
                <i class="align-middle" data-feather="user"></i> <span class="align-middle">Department</span>
            </a>
        </li>

        <li class="sidebar-item {{ !Request::routeIs('dashboard.employee.index') ? : 'active' }}">
            <a class="sidebar-link" href="{{ route('dashboard.employee.index') }}">
                <i class="align-middle" data-feather="user"></i> <span class="align-middle">Employee</span>
            </a>
        </li>

        <li class="sidebar-item {{ !Request::routeIs('dashboard.qr.index') ? : 'active'  }}">
            <a class="sidebar-link" href="{{ route('dashboard.qr.index') }}">
                <i class="align-middle" data-feather="minimize"></i> <span class="align-middle">QR</span>
            </a>
        </li>
    </ul>
</div>
