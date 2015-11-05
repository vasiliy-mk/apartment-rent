@extends('admin.layout')
@section('title')
{{trans('admin/apartment.create.add_apartment')}}
@stop

@section('content')
<div class="row">
    <h5 class="heading-title">{{trans('admin/apartment.create.add_apartment')}}</h5>
    <div class="col-md-12">
        <form action="{{Url()}}/admin/apartment/store" id="form" method="post">
            @include('admin/apartment/_form',['button_name'=>trans('admin/apartment.create.add'),'amenities'=>[],'photos'=>[],'active'=>true,'to_slider'=>false])
       </form>
    </div>
</div>
@stop

