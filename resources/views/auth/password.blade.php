
@extends('auth/layout')
@section('title')
{{trans('auth.password.restore')}}
@stop
@section('content')
<h4>{{trans('auth.password.restore')}}</h4>

<form id="form" method="POST" action="{{Url()}}/password/email">

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>{{trans('auth.password.email')}}</label>
                <input type="text" class="form-control input-sm" name="email" value="{{old('email')}}"/>
            </div>
        </div>
    </div>
<div align="center">
        <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}"/>
        <button type="submit" id="submit" class="btn btn-primary">{{trans('auth.password.send')}}</button>
</div>

</form>
<script>
    jQuery(function($){
        // amenity form validator
        $("#submit").click(function(){
            var result = vv_validator.validate({
                form: '#form',
                required_arr: ['email'],
                email_arr: ['email']
            });
            return result;

        });
    });
</script>
@stop