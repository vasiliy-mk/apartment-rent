@extends('admin.layout')
@section('title')
{{trans('admin/pages.create.add_page')}}
@stop
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="heading-title">{{trans('admin/pages.create.add_page')}}</span>
            </div>
            <div class="panel-body">
                <form action="{{Url()}}/admin/page/store" id="form" method="post">
                    @include('admin/page/_form',['button_name'=>trans('admin/pages.create.add'),'active'=>true,'to_menu'=>false])
                </form>
            </div>
        </div>
    </div>
</div>
@stop

