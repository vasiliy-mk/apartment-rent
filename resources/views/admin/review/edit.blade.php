@extends('admin.layout')
@section('title')
{{trans('admin/reviews.edit.edit_review')}} #{{$review->id}}
@stop
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="heading-title">{{trans('admin/reviews.edit.edit_review')}} #{{$review->id}}</span>
            </div>
            <div class="panel-body">
                <form action="{{Url()}}/admin/review/{{$review->id}}/update" id="form" method="post">
                @include('admin.review._form',['button_name'=>trans('admin/reviews.edit.save'),'active'=>$review->active])
                </form>
            </div>
        </div>
    </div>
</div>
@stop
