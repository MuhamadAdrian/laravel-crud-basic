<!DOCTYPE html>
<html lang="en">
@include('template.header')

<body>
    <div class="vh-100 d-flex flex-column justify-content-center align-items-center">
        <h3 class="text-center">@yield('login-title', 'APLIKASIKU')</h3>
        @yield('content')
    </div>
</body>

</html>
