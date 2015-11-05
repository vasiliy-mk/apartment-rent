@section('resources')
<script src="{{Url()}}/public/js/review.js"></script>
@stop

<div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('admin/reviews.form.name')}} <sup>*</sup></label>
                                <input type="text"  class="form-control input-sm" name="name" value="{{$review->name}}"/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('admin/reviews.form.email')}}</label>
                                <input type="text"  class="form-control input-sm" name="email" value="{{$review->email}}"/>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{trans('admin/reviews.form.text')}}<sup>*</sup></label>
                                (<span id="charsLeft"></span>)
                                <textarea type="text"  class="form-control input-sm" rows="5" name="text" id="review-message" >{{$review->text}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <input name="active" type="hidden" value="0">
                                    <label> <input name="active" type="checkbox" value="1" {{set_checked($active)}}>{{trans('admin/reviews.form.activate')}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                   <button type="submit" id="submit" class="btn btn-primary">{{$button_name}}</button>
