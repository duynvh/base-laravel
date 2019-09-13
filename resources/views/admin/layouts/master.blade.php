<!DOCTYPE html>
<html lang="en-us">
<head>
    @include('admin.skins.meta')
    @include('admin.skins.styleSheet')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('admin.layouts.header')
        @include('admin.layouts.sidebar')
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('admin.layouts.footer')
    </div>
    @include('admin.skins.javascript')
</body>
</html>
