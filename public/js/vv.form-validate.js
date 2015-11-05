var vv_validator = {
        form: '',
        required_arr: [],
        email_arr:[],
        scroll_top:true,
        isValidEmail: function(name,value){
               var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,10}(?:\.[a-z]{2})?)$/i;
               return regex.test(value);

        },

        validator: function(){

            var obj = this;
            var result = true;
                $(obj.form).find(":input").each(function() {
                    var error =0;
                    var field = $(this);
                    var name =  $(this).attr('name')
                    if($.inArray(name,obj.required_arr) != -1) {
                      if(!field.val()){
                          error =1;
                      }
                    }

                    if($.inArray(name,obj.email_arr) != -1) {
                        if(!obj.isValidEmail(name,field.val())){
                            error =1;
                        }

                    }
                    if(error){
                        obj.errorStyle(field);
                        if(result && obj.scroll_top){
                            $('html, body').animate({scrollTop:field.offset().top-100}, '200');
                        }
                        result = false;

                    }else{
                        obj.successStyle(field);
                    }

                });
            return result;
        },

        errorStyle: function(field){
            field.css('border', '#E76661 2px solid');
        },

        successStyle: function(field){
            field.css('border', '');
        },
        validate: function(params){
                this.form = params.form;
                this.required_arr = params.required_arr;
                this.email_arr = params.email_arr;
                this.scroll_top = params.scroll_top;
                return this.validator();
        }
};





