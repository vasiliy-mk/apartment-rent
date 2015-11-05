@extends('admin.layout')
@section('title')
{{trans('admin/amenity.edit.edit_amenity')}}
@stop
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="heading-title">{{trans('admin/amenity.edit.edit_amenity')}}</span>
            </div>
            <div class="panel-body">
                <form action="{{Url()}}/admin/amenity/{{$amenity->id}}/update" id="form" method="post">
                    @include('admin/amenity/_form',['button_name'=>trans('admin/amenity.edit.save'),'active'=>$amenity->active])
                </form>
            </div>
        </div>
    </div>
</div>
@stop

