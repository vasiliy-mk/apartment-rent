@extends('admin.layout')
@section('title')
{{trans('admin/settings.index.settings')}}
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="heading-title">{{trans('admin/settings.index.settings')}}</span>
            </div>
            <div class="panel-body">
                <form action="{{Url()}}/admin/settings/update" id="form" method="post">
                  @include('admin/settings/_form')
                </form>
            </div>
        </div>
    </div>
</div>



@stop









