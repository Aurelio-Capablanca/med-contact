<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">@yield('page-title', 'Dashboard')</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.form') }}">Home</a></li>
                    @yield('breadcrumb')
                </ul>
            </div>
        </div>
    </div>
</div>
