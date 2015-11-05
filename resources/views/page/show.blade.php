@extends('layout')
@section('title')
{{$page->name}}
@stop
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                @if(Auth::check())
                <div class="hover-buttons">
                    <a href="{{Url()}}/admin/page/{{$page->id}}/edit" title="Редактировать"><i class="glyphicon glyphicon-edit"></i></a>
                </div>
                @endif
                <h1>{{$page->name}}</h1>
                <p>{!!$page->body!!}</p>
            </div>
        </div>
    </div>
  </div>

@stop


