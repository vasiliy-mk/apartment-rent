@extends('admin.layout')
@section('title')
{{trans('admin/amenity.create.add_amenity')}}
@stop
@section('content')
<div class="row">
    <div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="heading-title">{{trans('admin/amenity.create.add_amenity')}}</span>
        </div>
        <div class="panel-body">
            <form action="{{Url()}}/admin/amenity/store" id="form" method="post">
                @include('admin/amenity/_form',['button_name'=>trans('admin/amenity.create.add'),'active'=>true])
            </form>
        </div>
    </div>
    </div>
</div>
@stop

