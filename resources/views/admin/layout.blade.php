<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    @include('_sources')
    <script src="{{Url()}}/public/ckeditor/ckeditor.js"></script>
    <script>
        var ckeditor_settings ={
            filebrowserBrowseUrl:        domain_url+'/public/fileman/index.html',
            filebrowserImageBrowseUrl:  domain_url+'/public/fileman/index.html?type=image',
            removeDialogTabs:           'link:upload;image:upload',
            language:                     site_language
        };
    </script>


    <link href="{{Url()}}/public/css/admin.css" rel="stylesheet" type="text/css"/>
    @yield('resources')
</head>
<body>
<div class="container main-container">
    @include('admin/_navbar')
    <div class="row">
    @include('admin/_sidebar')
    </div>
        <div class="col-md-9">
            @include('_flash_message')
            @yield('content')
        </div>
    </div>
</div>
@include('_footer')
</body>
</html>
