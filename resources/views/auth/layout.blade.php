<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    @include('_sources')
</head>
<body>
    <div style="width: 350px; margin:0 auto; padding-top: 100px">
            <div class="panel panel-default">
                <div class="panel-body">
                    @include('_flash_message')
                    @yield('content')
                </div>
            </div>
    </div>
</body>
</html>
