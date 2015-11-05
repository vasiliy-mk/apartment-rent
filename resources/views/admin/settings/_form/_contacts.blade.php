<div class="panel panel-default border-top-none">

    <div class="panel-body">

        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-8">
                <div class="form-group" id="phones_container">
                    <label>{{trans('admin/settings.contacts.phones')}}</label>
                    <div class="form-inline">
                        <input type="text" class="form-control input-sm" name="contact_phones[]" value="{{$settings['contact_phones'][0]}}"/>
                        <i class="glyphicon glyphicon-plus add-phone" title="{{trans('admin/settings.contacts.add_phone')}}"></i>

                    </div>

                    @for($i=1; $i<count($settings['contact_phones']); $i++)
                    <div class="form-inline">
                        <input type="text"  class="form-control input-sm" name="contact_phones[]" value="{{$settings['contact_phones'][$i]}}"/>
                        <i class="glyphicon glyphicon-remove  remove-phone"></i>
                    </div>
                    @endfor
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{trans('admin/settings.contacts.skype')}}</label>
                    <input type="text"  class="form-control input-sm" name="skype" value="{{$settings['skype']}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{trans('admin/settings.contacts.viber')}}</label>
                    <input type="text"  class="form-control input-sm" name="viber" value="{{$settings['viber']}}"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{trans('admin/settings.contacts.email')}}</label>
                    <input type="text"  class="form-control input-sm" name="email" value="{{$settings['email']}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>{{trans('admin/settings.contacts.text')}}</label>
                    <textarea type="text"  class="form-control input-sm" rows="30" name="contact_text">{!!$settings['contact_text']!!}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>



