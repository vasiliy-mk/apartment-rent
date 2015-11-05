<div class="form-group">
    <div class="form-inline">
        <label>{{trans('captcha.captcha')}}</label><br>
        <div id="captcha_img"><img src="{{captcha_src('flat')}}"/></div>
        <input type="text" class="form-control input-sm" id="captcha" maxlength="4" name="captcha"/>
    </div>
</div>
