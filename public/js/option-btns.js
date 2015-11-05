jQuery(function($){

// destroy button
    $(document).on('click', '.destroy-btn',function(){
        var url = $(this).attr('href');
        var title = $(this).attr('title');

        if(confirm(title+' ?')) {
            $(this).parent().parent().hide(300);
            $('#count').text($('#count').text()-1);
             ajaxPostChecked(url,true)
        }
        event.preventDefault();
    });

// checkboxes
    $(document).on('click','.activate,.to_slider,.to_menu',function(){
        var checked = ($(this).is(':checked')) ? 1:0;
        var url = $(this).val();
        ajaxPostChecked(url,checked)
    });

    $('.hover-buttons-container').hover(function(){
        $('.hover-buttons',this).toggle();
    })

});

function ajaxPostChecked(url,checked){
    $.ajax({
        type: "POST",
        url: url,
        async: true,
        data: {
            checked:checked,
            _token: $('#_token').val()
        }

    });
}
