
<div class="navbar navbar-inverse main-navbar">
    <div class="navbar-header">
        <a href="{{Url('admin/dashboard')}}" class="navbar-brand">{{$settings['company_name']}}</a>
        <button tpye="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
        <ul class="nav navbar-nav">
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a class="navbar-menu-color" href="{{Url()}}"> <i class="glyphicon glyphicon-home"></i> <b>{{trans('admin/navbar.homepage')}}</b></a></li>
            <li><a class="navbar-menu-color" title="{{trans('admin/navbar.logout')}}" href="{{Url()}}/auth/logout"><i class="glyphicon glyphicon-log-out"></i></a></li>
        </ul>
    </div>
</div>
