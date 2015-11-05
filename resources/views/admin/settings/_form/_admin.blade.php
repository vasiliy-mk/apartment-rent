<div class="panel panel-default border-top-none">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{trans('admin/settings.admin.name')}}</label>
                    <input type="text"  class="form-control input-sm" name="name" value="{{$settings['name']}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{trans('admin/settings.admin.email')}}</label>
                    <input type="text"  class="form-control input-sm" name="admin_email" value="{{$settings['admin_email']}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{trans('admin/settings.admin.password')}}</label>
                    <input type="password"  class="form-control input-sm" id="password" name="password"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{trans('admin/settings.admin.password_confirm')}}</label>
                    <input type="password"  class="form-control input-sm" id="password_confirm" name="password_confirm"/>
                </div>
            </div>
        </div>











    </div>
</div>


