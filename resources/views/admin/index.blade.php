@extends('admin.layout')

@section('title')
{{trans('admin/reviews.index.reviews')}}
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="heading-title">{{trans('admin/index.dashboard')}}</span>
            </div>
           <div class="panel-body">
                <div class="row">
                    <div class="col-xs-6 col-md-3">
                        <a href="{{Url('admin/apartments')}}" class="thumbnail dashboard-item">
                           <i class="glyphicon glyphicon-th"></i><br>
                            {{trans('admin/sidebar.apartments')}}

                        </a>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <a href="{{Url('admin/amenities')}}" class="thumbnail dashboard-item">
                            <i class="glyphicon glyphicon-lamp"></i><br>
                            {{trans('admin/sidebar.amenity')}}
                        </a>
                    </div>

                    <div class="col-xs-6 col-md-3">
                        <a href="{{Url('admin/pages')}}" class="thumbnail dashboard-item">
                            <i class="glyphicon glyphicon-duplicate"></i><br>
                            {{trans('admin/sidebar.pages')}}
                        </a>
                    </div>

                    <div class="col-xs-6 col-md-3">
                        <a href="{{Url('admin/reviews')}}" class="thumbnail dashboard-item">
                            <i class="glyphicon glyphicon-comment"></i><br>
                            {{trans('admin/sidebar.reviews')}}
                        </a>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <a href="{{Url()}}/public/fileman?&langCode={{Lang::locale()}}" class="thumbnail dashboard-item">
                            <i class="glyphicon glyphicon-folder-open"></i><br>
                            {{trans('admin/sidebar.file_manager')}}
                        </a>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <a href="{{Url('admin/settings')}}" class="thumbnail dashboard-item">
                            <i class="glyphicon glyphicon-wrench"></i><br>
                            {{trans('admin/sidebar.settings')}}

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop


