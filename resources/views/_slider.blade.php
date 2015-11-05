<div id="carousel-generic" class="carousel slide" data-ride="carousel" @if(!$slider_photos['slide'])  data-interval="0" @endif>
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @for($i=0; $i<$slider_photos['count']; $i++)
        <li data-target="#carousel-generic" data-slide-to="{{$i}}" @if($i==0) class="active" @endif></li>
        @endfor
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @for($i=0; $i<$slider_photos['count']; $i++)
            <div class="item @if($i==0) active @endif">
                <img src="{{$slider_photos['path'][$i]}}"/>
                <div class="carousel-caption slider-text">
                 @if(isset($slider_photos['text'][$i]))
                    {!!$slider_photos['text'][$i]!!}
                 @endif
                </div>
            </div>
        @endfor
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
