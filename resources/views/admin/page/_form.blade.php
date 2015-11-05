
                  <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>{{trans('admin/pages.form.name')}}</label>
                                <input type="text"  class="form-control input-sm" name="name" value="{{$page->name}}"/>
                            </div>
                        </div>
                    </div>
                  <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>{{trans('admin/pages.form.slug')}}</label>
                                <input type="text"  class="form-control input-sm" name="slug" id="slug" value="{{$page->slug}}"/>
                            </div>
                        </div>
                    </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>{{trans('admin/pages.form.description')}}</label>
                              <textarea type="text"  class="form-control input-sm" rows="30" name="body">{{$page->body}}</textarea>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <input name="active" type="hidden" value="0">
                                    <label> <input name="active" type="checkbox" value="1" {{set_checked($active)}}>{{trans('admin/pages.form.activate')}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <input name="to_menu" type="hidden" value="0">
                                    <label> <input name="to_menu" type="checkbox" value="1" {{set_checked($to_menu)}}>{{trans('admin/pages.form.add_to_menu')}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input name="id" id="id" type="hidden" value="{{$page->id}}">
                    <button type="submit" id="submit" class="btn btn-primary">{{$button_name}}</button>

                  <script>

                      jQuery(function($){

                          CKEDITOR.replace('body',ckeditor_settings);

                              // page form validator
                              $("#submit").click(function(){
                                  var result = vv_validator.validate({
                                      form: '#form',
                                      required_arr: ['name','slug']
                                  });

                                    $.ajax({
                                          // the URL for the request
                                          url: domain_url+'/admin/page/chekuniqueslug',
                                          type: "POST",
                                          data:{
                                              'slug':   $('#slug').val(),
                                              'id':     $('#id').val()
                                          },
                                          dataType : "text",
                                          async: false,
                                          success: function(data){
                                              $('.validation-error').remove();
                                              if(data==1){
                                                  $('#slug').css('border', '#E76661 2px solid');
                                                  $('#slug').after('<span class="validation-error">{{trans('admin/pages.form.slug_in_use')}}!</span>');
                                                  result = false;
                                              }

                                          }
                                      });
                                   return result;
                              });

                      });
                  </script>