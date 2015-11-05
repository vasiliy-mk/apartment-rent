<div class="panel panel-default border-top-none">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div id="output">
                        @include('admin/apartment/_img_container')
                    </div>
                    <div class="button-container">
                        <div id="preloader"><img src="{{URL()}}/public/images/preloader.gif" /></div>
                        <div class="file-upload btn btn-warning">
                            <span>{{trans('admin/apartment.form.add_photo')}}</span>
                            <input type="file" class="upload" id="file" name="file"  multiple="multiple" accept="image/*" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <div class="checkbox">
                        <input name="to_slider" type="hidden" value="0">
                        <label> <input name="to_slider" type="checkbox" value="1" {{set_checked($to_slider)}}>{{trans('admin/apartment.form.add_to_slider')}}</label>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
