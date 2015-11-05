<div class="panel panel-default border-top-none">

    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{trans('admin/apartment.form.street')}}</label>
                    <input type="text"  class="form-control input-sm"  id="street" name="street" value="{{$apartment->street}}"/>
                    <input type="hidden" id="city" value="{{$settings['city']}}"/>
                    <input type="hidden" id="country" value="{{$settings['country']}}"/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{trans('admin/apartment.form.house')}}</label>
                    <input type="text"  class="form-control input-sm"  id="house" name="house" value="{{$apartment->house}}"/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{trans('admin/apartment.form.flat')}}</label>
                    <input type="text"  class="form-control input-sm"  name="flat" value="{{$apartment->flat}}"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{trans('admin/apartment.form.rooms')}}</label>
                    <input type="text"  class="form-control input-sm" name="rooms" value="{{$apartment->rooms}}"/>
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label>{{trans('admin/apartment.form.beds')}}</label>
                    <input type="text" class="form-control input-sm" name="beds" value="{{$apartment->beds}}"/>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>{{trans('admin/apartment.form.area')}}</label>
                    <input type="text" class="form-control input-sm" name="area" value="{{$apartment->area}}"/>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{trans('admin/apartment.form.price')}}</label> ({{trans('admin/settings.main.'.$settings['currency'])}})
                    <input type="text"  class="form-control input-sm" name="price" value="{{$apartment->price}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>{{trans('admin/apartment.form.description')}}</label>
                    <textarea type="text"  class="form-control input-sm" rows="10" name="description">{!!$apartment->description!!}</textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>{{trans('admin/apartment.form.note')}}</label>
                    <textarea type="text"  class="form-control input-sm" rows="4" name="note">{{$apartment->note}}</textarea>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <div class="checkbox">
                        <input name="active" type="hidden" value="0">

                        <label> <input name="active" type="checkbox" value="1"  {{set_checked($active)}}>{{trans('admin/apartment.form.activate')}}</label>

                    </div>
                </div>
            </div>
        </div>

</div>
</div>


