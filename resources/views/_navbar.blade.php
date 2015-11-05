<div class="navbar navbar-default main-navbar">
    <div class="navbar-header">
        <a href="{{Url()}}" class="navbar-brand">{{$settings['company_name']}}</a>
        <button tpye="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
        <ul class="nav navbar-nav">
            <li{!!set_active(Request::path(),'/')!!}><a href="{{url()}}">{{trans('front/navbar.home')}}</a></li>
            @if($settings['page_review'])
              <li{!!set_active(Request::path(),'reviews')!!}><a href="{{url('reviews')}}">{{trans('front/navbar.review')}}</a></li>
            @endif
            @if($settings['page_map'])
              <li{!!set_active(Request::path(),'map')!!}><a href="{{url('map')}}">{{trans('front/navbar.map')}}</a></li>
            @endif
            @if($settings['page_contact'])
              <li{!!set_active(Request::path(),'contacts')!!}><a href="{{url('contacts')}}">{{trans('front/navbar.contact')}}</a></li>
            @endif
            @foreach($settings['page_menu'] as $slug=>$title)
             <li{!!set_active(Request::path(),$slug)!!}><a class="navbar-menu-color" href="{{Url($slug)}}">{{$title}}</a></li>
            @endforeach
        </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                    <li><a class="navbar-menu-color" href="{{Url('admin/dashboard')}}"> <i class="glyphicon glyphicon-cog"></i><b>{{trans('front/navbar.admin')}}</b></a></li>
                    <li><a class="navbar-menu-color" title="{{trans('front/navbar.logout')}}" href="{{Url('auth/logout')}}"><i class="glyphicon glyphicon-log-out"></i></a></li>

                    @else
                    <li><a class="navbar-menu-color" title="{{trans('front/navbar.login')}}" href="{{Url('auth/login')}}"><i class="glyphicon glyphicon-log-in"></i></a></li>
                    @endif
                </ul>

    </div>
</div>
