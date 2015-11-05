

@if($errors->any())
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{trans('validation.error')}}</strong>
                @foreach($errors->all() as $error)
                <br />{{$error}}
                @endforeach
            </div>
@else

        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{session('message')}}
        </div>
            <script>$(".alert").delay(6000).slideUp()</script>
        @endif

        @if(session('message-warning'))
        <div class="alert alert-warning alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {!!session('message-warning')!!}
        </div>
        @endif

@endif


