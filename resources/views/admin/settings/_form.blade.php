

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#main" aria-controls="main" role="tab" data-toggle="tab">{{trans('admin/settings.form.main')}}</a></li>
    <li role="presentation"><a href="#contacts" aria-controls="contacts" role="tab" data-toggle="tab">{{trans('admin/settings.form.contacts')}}</a></li>
    <li role="presentation"><a href="#pages" aria-controls="pages" role="tab" data-toggle="tab">{{trans('admin/settings.form.pages')}}</a></li>
    <li role="presentation"><a href="#admin" aria-controls="admin" role="tab" data-toggle="tab">{{trans('admin/settings.form.admin')}}</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="main">@include('admin/settings/_form/_main')</div>
    <div role="tabpanel" class="tab-pane" id="contacts">@include('admin/settings/_form/_contacts')</div>
    <div role="tabpanel" class="tab-pane" id="pages">@include('admin/settings/_form/_pages')</div>
    <div role="tabpanel" class="tab-pane" id="admin">@include('admin/settings/_form/_admin')</div>
</div>
<button type="submit" id="submit" class="btn btn-primary">{{trans('admin/settings.form.save')}}</button>



<script>
    jQuery(function($){

        CKEDITOR.replace( 'description',ckeditor_settings);
        CKEDITOR.replace('contact_text',ckeditor_settings);

        // page form validator
        $("#submit").click(function(){
            var result = vv_validator.validate({
                form: '#form',
                required_arr: ['company_name','title','name','admin_email','email','contact_phones[]'],
                email_arr:    ['admin_email','email']
            });

            $('.validation-error').remove();

            var password         = $("#password").val();
            var password_confirm = $("#password_confirm").val();


            if(password){
                if(password.length<6){
                    $('#password').css('border', '#E76661 2px solid');
                    $('#password').after('<span class="validation-error">{{trans('admin/settings.message.password_too_short',['min'=>'6'])}}</span>');
                    result = false;
                }

                if(password!=password_confirm && result==true){
                    $('#password, #password_confirm').css('border', '#E76661 2px solid');
                    $('#password').after('<span class="validation-error">{{trans('admin/settings.message.password_not_match')}}</span>');
                    result = false;
                }
            }

            return result;
        });


        $(".add-phone").click(function(){
            var html = '<div class="form-inline">' +
                '<input type="text"  class="form-control input-sm " name="contact_phones[]"/> ' +
                '<i class="glyphicon glyphicon-remove remove-phone"></i>' +
                '</div>';
            $("#phones_container").append(html);
        })

        $(document).on('click','.remove-phone',function(){
            $(this).parent().remove();
        })
    });
</script>