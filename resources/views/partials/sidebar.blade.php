<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('dashboard.form') }}" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
{{--                <img src="{{asset('/assets/images/logo-dark.svg')}}" class="img-fluid logo-lg" alt="logo">--}}
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="{{ route('dashboard.form') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('users.form') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-brand-chrome"></i></span>
                        <span class="pc-mtext">Users</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('doctors.form') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-brand-chrome"></i></span>
                        <span class="pc-mtext">Doctors</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ Sidebar Menu ] end -->
