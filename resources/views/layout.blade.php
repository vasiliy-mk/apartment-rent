<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    @include('_sources')
    <link href="{{Url()}}/public/css/user.css" rel="stylesheet" type="text/css"/>

    @yield('resources')
</head>
<body>
<div class="container main-container">
    @include('_navbar')
    @include('_flash_message')
    @yield('content')
 </div>
 @include('_footer')
</body>
</html>
