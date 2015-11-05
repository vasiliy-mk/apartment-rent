@extends('admin.layout')
@section('title')
{{trans('admin/apartment.edit.edit_apartment')}} {{trans('admin/apartment.edit.id')}}:{{$apartment->id}}
@stop
 @section('content')
<div class="row">
   <h5 class="heading-title">{{trans('admin/apartment.edit.edit_apartment')}} {{trans('admin/apartment.edit.id')}}: {{$apartment->id}}</h5>
    <div class="col-md-12">
        <form action="{{Url()}}/admin/apartment/{{$apartment->id}}/update" id="form" method="post">
            @include('admin/apartment/_form',[
            'button_name'=>trans('admin/apartment.edit.save'),
            'active'=>$apartment->active,
            'to_slider'=>$apartment->to_slider
            ])
        </form>
    </div>
</div>
@stop

