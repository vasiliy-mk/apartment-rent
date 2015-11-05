@foreach($photos as $photo)
    <div class="img-container">
      <img class="icon" src="{{$photo['ico']}}"/>
      <input type="hidden" name="photos[]" value="{{$photo['name']}}"/>
       <img class="remove" src="{{Url()}}/public/images/move_img.png">
    </div>
@endforeach

@if(isset($errors))
    @foreach($errors as $error)
    <div class="upload-error">
         {{$error}} <img class="remove" src="{{Url()}}/public/images/move_img.png">
    </div>
    @endforeach
@endif



