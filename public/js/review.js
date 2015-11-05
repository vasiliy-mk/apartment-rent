jQuery(function($){
    var result = true;
    $('#review-message').limit(1000,'#charsLeft');
    // form validator
    $("#submit").click(function(){
        result = vv_validator.validate({
            form: '#form',
            required_arr: ['name','text','captcha'],
            scroll_top:false
        });
        return result;
    });

});


