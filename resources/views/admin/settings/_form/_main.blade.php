<div class="panel panel-default border-top-none">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>{{trans('admin/settings.main.country')}}</label>
                    <input type="text"  class="form-control input-sm" name="country" value="{{$settings['country']}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>{{trans('admin/settings.main.city')}}</label>
                    <input type="text"  class="form-control input-sm" name="city" value="{{$settings['city']}}"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>{{trans('admin/settings.main.language')}}</label>
                    <select name="language" class="form-control input-sm">
                        <option value="en" {{set_selected('en',$settings['language'])}}>{{trans('admin/settings.main.english')}}</option>
                        <option value="ru" {{set_selected('ru',$settings['language'])}}>{{trans('admin/settings.main.russian')}}</option>
                    </select>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>{{trans('admin/settings.main.currency')}}</label>
                    <select name="currency" class="form-control input-sm">
                        <option value="uah" {{set_selected('uah',$settings['currency'])}}>{{trans('admin/settings.main.uah')}}</option>
                        <option value="usd" {{set_selected('usd',$settings['currency'])}}>{{trans('admin/settings.main.usd')}}</option>
                        <option value="rub" {{set_selected('rub',$settings['currency'])}}>{{trans('admin/settings.main.rub')}}</option>
                    </select>

                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>{{trans('admin/settings.main.company_name')}}</label>
                    <input type="text"  class="form-control input-sm" name="company_name" value="{{$settings['company_name']}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>{{trans('admin/settings.main.title')}}</label>
                    <input type="text"  class="form-control input-sm" name="title" value="{{$settings['title']}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>{{trans('admin/settings.main.description')}}</label>
                    <textarea type="text"  class="form-control input-sm" rows="30" name="description">{!!$settings['description']!!}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>


