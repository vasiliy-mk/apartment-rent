@extends('layout')
@section('title')
{{trans('front/review.user_reviews')}}
@stop

@section('resources')
<script src="{{Url()}}/public/js/review.js"></script>
@stop

@section('content')



<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
            <h1>{{trans('front/review.user_reviews')}}</h1>
            @if($settings['review_create'])
                <button class="btn btn-warning review-create" type="button" data-toggle="collapse" data-target="#collapse" aria-expanded="false" aria-controls="collapse">
                    {{trans('front/review.add_review')}}
                </button>
                <div class="collapse" id="collapse">
                        @include('review/_form')
                </div>
            @endif

                <div class="row reviews">
                    @foreach($reviews as $review)
                    <div class="col-sm-12">
                        <div class="review hover-buttons-container">
                            @if(Auth::check())
                            <div class="hover-buttons">
                               <a href="{{Url()}}/admin/review/{{$review->id}}/edit"><i class="glyphicon glyphicon-edit"></i></a>
                           </div>
                            @endif
                            <div class="user-name">{{$review->name}}</div>
                            <div class="post-date">{{$review->created_at}}</div>
                            <p class="review-text">{{$review->text}}</p>
                        </div>
                      </div>
                    @endforeach
                </div>
                <div align="right">{!!$reviews->setPath('')->render()!!}</div>

            </div>
        </div>
    </div>
</div>


@stop





