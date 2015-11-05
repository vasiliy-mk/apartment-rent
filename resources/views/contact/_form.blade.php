
<form action="{{Url()}}/contact/store" id="form" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('front/contact.name')}} <sup>*</sup></label>
                                <input type="text"  class="form-control input-sm" name="name" value="{{old('name')}}"/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('front/contact.email')}} <sup>*</sup></label>
                                <input type="text"  class="form-control input-sm" name="email" value="{{old('email')}}"/>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{trans('front/contact.title')}} <sup>*</sup></label>
                                <input type="text" class="form-control input-sm" name="title" value="{{old('title')}}"/>
                            </div>
                            <div class="form-group">
                                <label>{{trans('front/contact.message')}}<sup>*</sup></label>
                                (<span id="charsLeft"></span>)
                                <textarea type="text" id="contact-message" class="form-control input-sm" rows="5" name="text">{{old('text')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
@include('_captcha')
        </div>
                    </div>

                    <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}"/>
                    <button type="submit" id="submit" class="btn btn-primary">{{trans('front/contact.send')}}</button>
                </form>


<script>

    jQuery(function($){

        var result = true;
        $('#contact-message').limit(1000,'#charsLeft');
        // form validator
        $("#submit").click(function(){
            result = vv_validator.validate({
                form: '#form',
                required_arr: ['name','text','title','email','captcha'],
                email_arr: ['email'],
                scroll_top:false
            });

            return  result;

        });
    });

</script>