<div class="panel panel-default border-top-none">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    <label>{{trans('admin/apartment.form.seo_title')}}</label>
                    <input type="text"  class="form-control input-sm" name="seo_title" value="{{$apartment->seo_title}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    <label>{{trans('admin/apartment.form.slug')}}</label>
                    <input type="text"  class="form-control input-sm" name="slug" value="{{$apartment->slug}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    <label>{{trans('admin/apartment.form.seo_description')}}</label>
                    <input type="text"  class="form-control input-sm" name="seo_description" value="{{$apartment->seo_description}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    <label>{{trans('admin/apartment.form.seo_keywords')}}</label>
                    <input type="text"  class="form-control input-sm" name="seo_keywords" value="{{$apartment->seo_keywords}}"/>
                </div>
            </div>
        </div>
    </div>
</div>