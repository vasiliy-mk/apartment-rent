
@section('resources')
<script src="{{Url()}}/public/js/review.js"></script>
@stop
<div class="row">
    <div class="col-md-5">
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="{{Url()}}/review/store" id="form" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{trans('front/review.name')}} <sup>*</sup></label>
                        <input type="text"  class="form-control input-sm" name="name" value="{{old('name')}}"/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{trans('front/review.email')}}</label>
                        <input type="text"  class="form-control input-sm" name="email" value="{{old('email')}}"/>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>{{trans('front/review.message')}}<sup>*</sup></label>
                        (<span id="charsLeft"></span>)
                        <textarea type="text" id="review-message" class="form-control input-sm" rows="5" name="text">{{old('text')}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-md-5">
                        @include('_captcha')
                    </div>
           </div>

                <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}"/>
                <button type="submit" id="submit" class="btn btn-primary">{{trans('front/review.add')}}</button>
            </form>
        </div>
    </div>

</div>
</div>



