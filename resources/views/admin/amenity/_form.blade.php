                  <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('admin/amenity.form.name')}}</label>
                                <input type="text"  class="form-control input-sm" name="name" value="{{$amenity->name}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <input name="active" type="hidden" value="0">
                                    <label> <input name="active" type="checkbox" value="1" {{set_checked($active)}}>{{trans('admin/amenity.form.activate')}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input name="id" type="hidden" value="{{$amenity->id}}">
                  <button type="submit" id="submit" class="btn btn-primary">{{$button_name}}</button>

                  <script>
                      jQuery(function($){
                          // amenity form validator
                          $("#submit").click(function(){
                              var result = vv_validator.validate({
                                  form: '#form',
                                  required_arr: ['name','text']
                              });
                              return result;

                          });
                      });
                  </script>