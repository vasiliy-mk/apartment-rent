@extends('admin.layout')
@section('title')
{{trans('admin/pages.edit.edit_page')}} "{{$page->name}}"
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="heading-title">{{trans('admin/pages.edit.edit_page')}} "{{$page->name}}"</span>
            </div>
            <div class="panel-body">
                <form action="{{Url()}}/admin/page/{{$page->id}}/update" id="form" method="post">
                    @include('admin/page/_form',['button_name'=>trans('admin/pages.edit.save'),'active'=>$page->active,'to_menu'=>$page->to_menu])
                </form>
            </div>
        </div>
    </div>
</div>
@stop

