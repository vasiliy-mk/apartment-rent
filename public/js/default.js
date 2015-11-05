jQuery(function($){

    $(document).on('click','#main_checkbox',function(){
        if($(this).is(':checked')){
            $('.check').prop('checked','checked');
        }else{
            $('.check').removeAttr('checked');
        }
    });
});


function postSorter(form_id,url){
    $.ajax({
        type: "POST",
        url: url,_token: $('#_token'),
        data: $(form_id).serialize()
    });
}






