
<div class="panel panel-default border-top-none">

    <div class="panel-body">

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <div class="checkbox">
                        <input name="page_map" type="hidden" value="0">
                        <label> <input name="page_map" type="checkbox" value="1" {{set_checked($settings['page_map'])}} > {{trans('admin/settings.pages.page_map')}}</label>
                    </div>
                    <div class="checkbox">
                        <i class="glyphicon glyphicon-triangle-right"></i>

                        <input name="apartment_map" type="hidden" value="0">
                        <label> <input name="apartment_map" type="checkbox" value="1"  {{set_checked($settings['apartment_map'])}} > {{trans('admin/settings.pages.apartment_map')}}</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="form-group">
                    <div class="checkbox">
                        <input name="page_review" type="hidden" value="0">
                        <label> <input name="page_review" type="checkbox" value="1" {{set_checked($settings['page_review'])}}> {{trans('admin/settings.pages.reviews')}}</label>
                    </div>

                    <div class="checkbox">
                        <i class="glyphicon glyphicon-triangle-right"></i>
                        <input name="review_create" type="hidden" value="0">
                        <label> <input name="review_create" type="checkbox" value="1" {{set_checked($settings['review_create'])}}> {{trans('admin/settings.pages.review_add')}}</label>
                    </div>

                    <div class="checkbox">
                        <i class="glyphicon glyphicon-triangle-right"></i>
                        <input name="review_moderate" type="hidden" value="0">
                        <label> <input name="review_moderate" type="checkbox" value="1" {{set_checked($settings['review_moderate'])}}> {{trans('admin/settings.pages.review_moderate')}}</label>
                    </div>
                    <div class="checkbox">
                        <i class="glyphicon glyphicon-triangle-right"></i>
                        <input name="review_to_email" type="hidden" value="0">
                        <label> <input name="review_to_email" type="checkbox" value="1" {{set_checked($settings['review_to_email'])}}> {{trans('admin/settings.pages.review_to_email')}}</label>
                    </div>

                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <div class="checkbox">
                        <input name="page_contact" type="hidden" value="0">
                        <label> <input name="page_contact" type="checkbox" value="1" {{set_checked($settings['page_contact'])}} >{{trans('admin/settings.pages.contacts')}}</label>
                    </div>
                    <div class="checkbox">
                        <i class="glyphicon glyphicon-triangle-right"></i>
                        <input name="contact_form" type="hidden" value="0">
                        <label> <input name="contact_form" type="checkbox" value="1" {{set_checked($settings['contact_form'])}}>{{trans('admin/settings.pages.contact_form')}}</label>
                    </div>

                    <div class="checkbox">
                        <i class="glyphicon glyphicon-triangle-right"></i>
                        <input name="phones_active" type="hidden" value="0">
                        <label> <input name="phones_active" type="checkbox" value="1" {{set_checked($settings['phones_active'])}} >{{trans('admin/settings.pages.phones')}}</label>
                    </div>
                    <div class="checkbox">
                        <i class="glyphicon glyphicon-triangle-right"></i>
                        <input name="skype_active" type="hidden" value="0">
                        <label> <input name="skype_active" type="checkbox" value="1" {{set_checked($settings['skype_active'])}} >{{trans('admin/settings.pages.skype')}}</label>
                    </div>
                    <div class="checkbox">
                        <i class="glyphicon glyphicon-triangle-right"></i>
                        <input name="viber_active" type="hidden" value="0">
                        <label> <input name="viber_active" type="checkbox" value="1" {{set_checked($settings['viber_active'])}}>{{trans('admin/settings.pages.viber')}}</label>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>