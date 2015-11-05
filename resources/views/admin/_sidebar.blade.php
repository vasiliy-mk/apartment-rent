<div class="col-md-3">
    <div class="panel panel-default sidebar-menu">
        <ul>
            <li{!!set_active(Request::path(),'admin/apartments/*')!!}><a href="{{Url('admin/apartments')}}"><i class="glyphicon glyphicon-th"></i>{{trans('admin/sidebar.apartments')}}</a></li>
            <li{!!set_active(Request::path(),'admin/amenities/*')!!}><a href="{{Url('admin/amenities')}}"><i class="glyphicon glyphicon-lamp"></i>{{trans('admin/sidebar.amenity')}}</a></li>
            <li{!!set_active(Request::path(),'admin/pages/*')!!}><a href="{{Url('admin/pages')}}"><i class="glyphicon glyphicon-duplicate"></i>{{trans('admin/sidebar.pages')}}</a></li>
            <li{!!set_active(Request::path(),'admin/reviews/*')!!}><a href="{{Url('admin/reviews')}}"><i class="glyphicon glyphicon-comment"></i>{{trans('admin/sidebar.reviews')}}</a></li>
            <li><a href="{{Url()}}/public/fileman?langCode={{Lang::locale()}}" target="_blank"><i class="glyphicon glyphicon-folder-open"></i>{{trans('admin/sidebar.file_manager')}}</a></li>
            <li{!!set_active(Request::path(),'admin/settings/*')!!}><a href="{{Url('admin/settings')}}"><i class="glyphicon glyphicon-wrench"></i>{{trans('admin/sidebar.settings')}}</a></li>
        </ul>
    </div>