@extends('admin.layout')
@section('title')
{{trans('admin/reviews.create.add_review')}}
@stop
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="heading-title">{{trans('admin/reviews.create.add_review')}}</span>
            </div>
            <div class="panel-body">
                <form action="{{Url()}}/admin/review/store" id="form" method="post">
                    @include('admin.review/_form',['button_name'=>trans('admin/reviews.create.add'),'active'=>true])
                </form>
            </div>
        </div>
    </div>
</div>
@stop
