<!DOCTYPE html>
<html lang="en-us">
<head>
    @include('module-base::admin.skins.meta')
    @include('module-base::admin.skins.styleSheet')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        @yield('content')
    </header>
</div>
</body>
</html>
