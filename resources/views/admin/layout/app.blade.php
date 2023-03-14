<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.header')
</head>

<body class="g-sidenav-show  bg-gray-100">
    @include('admin.layout.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('admin.layout.navigation')

        @yield('content')
        @yield('billing')
        @yield('profile')
        @yield('tables')

        @yield('attributes.index')
        @yield('attributes.edit')
    </main>
    @include('admin.layout.ui-configurator')

    @include('admin.layout.footer')

</body>

</html>
