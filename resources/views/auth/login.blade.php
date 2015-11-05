@extends('auth/layout')
@section('title')
{{trans('auth.login.log_in')}}
@stop
@section('content')
                    <form action="{{Url('auth/login')}}" id="form" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{trans('auth.login.username')}}</label>
                                    <input type="text" class="form-control input-sm" name="name" value="{{old('name')}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{trans('auth.login.password')}}</label>
                                    <input type="password" class="form-control input-sm" name="password"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="pull-right reset-password"><a href="{{Url('password/email')}}">{{trans('auth.login.restore')}}</a></div>

                                    <label> <input type="checkbox" name="remember"> {{trans('auth.login.remember_me')}}</label>
                                </div>

                            </div>
                        </div>


                        <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}"/>
                        <button type="submit" id="submit" class="btn btn-primary">{{trans('auth.login.log_in')}}</button>

                    </form>
@stop