<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    @yield('style')
</head>

<body>
@include('layouts.nav')
@yield('header')
<div class="container" id="main">
    @include('layouts.messages')
    @yield('content')
    @include('layouts.footer')
</div>
<script src="{{ asset('/assets/js/vendor.js') }}"></script>
@yield('script')
</body>
</html>
