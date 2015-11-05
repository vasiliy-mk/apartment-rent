jQuery(function($){

    $("#captcha_img img").click(function(){
        captcha_reload()
    });

    $("#captcha_img").css('cursor','pointer');

});

function captcha_reload() {
    var random_value = new Date().getTime();
    $('#captcha_img img').attr('src',domain_url+'/captcha/flat?rnd='+random_value);
    $('#captcha').val('');
};

