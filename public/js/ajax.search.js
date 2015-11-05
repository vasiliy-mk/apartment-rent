

    jQuery(function($){


        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                } else {
                   //getItems(page);
                }
            }
        });

        $(document).ready(function() {
            $(document).on('click', '.pagination a', function (e) {
                getItems($(this).attr('href').split('page=')[1]);
                $('html, body').animate({scrollTop:$('body').offset().top}, '10');
                e.preventDefault();
            });

        });


      $(".input-text, .input-select").change(function(){
        getItems(1);
     });


  });

    function getItems(page) {

        $('#preloader').show();

        $.ajax({
            url : '?page='+page+'&'+$('#form').serialize(),
            async: true,
           dataType: 'json'
        }).done(function (data) {
            $('#ajax_body').html(data);
            location.hash = page;

        }).fail(function (data) {
            $('#ajax_body').html(data);
        });
        $('#preloader').hide();

    }


