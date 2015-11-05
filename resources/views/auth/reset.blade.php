@extends('auth/layout')
@section('title')
{{trans('auth.reset.set_password')}}
@stop
@section('content')
<h4 align="center">{{trans('auth.reset.set_password')}}</h4>
<form action="{{Url()}}/password/reset" id="form" method="post">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>{{trans('auth.reset.email')}} </label>
                <input type="text" class="form-control input-sm" name="email" value="{{old('email')}}"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>{{trans('auth.reset.password')}}</label>
                <input type="password" class="form-control input-sm" name="password"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>{{trans('auth.reset.password_confirm')}}</label>
                <input type="password" class="form-control input-sm" name="password_confirmation"/>
            </div>
        </div>
    </div>
    <input type="hidden" name="token" value="{{$token}}">
    <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}"/>
    <button type="submit" id="submit" class="btn btn-primary">{{trans('auth.reset.set')}}</button>
</form>
@stop