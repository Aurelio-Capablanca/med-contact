<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Dashboard') - Med Contact</title>
    @include('partials.head')
</head>
<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
@include('partials.preloader')
@include('partials.sidebar')
@include('partials.header')

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        @include('partials.breadcrumb')
        @yield('content')
    </div>
</div>
<!-- [ Main Content ] end -->
@include('partials.footer')
@include('partials.scripts')
</body>
</html>
