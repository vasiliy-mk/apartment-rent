@extends('layout')
@section('title')
{{trans('front/contact.contact')}}
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1>{{trans('front/contact.contact')}}</h1>
                {!!$settings['contact_text']!!}
                @if($settings['phones_active'])
                <b>{{trans('front/contact.phones')}}:</b>
                    <ul>
                        @foreach($settings['contact_phones'] as $phone)
                        <li>{{$phone}}</a></li>
                        @endforeach
                    </ul>
                @endif

                @if($settings['skype_active'] && $settings['skype'])
                <b>{{trans('front/contact.skype')}}:</b> {{$settings['skype']}}<br />
                @endif
                @if($settings['viber_active'] && $settings['viber'])
                <b>{{trans('front/contact.viber')}}:</b> {{$settings['viber']}}
                @endif
            </div>
        </div>
    </div>
</div>

@if($settings['contact_form'])
<p><b>{{trans('front/contact.contact_form')}}</b></p>
<div class="row">
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-body">
                @include('contact/_form')
            </div>
        </div>

    </div>
</div>
@endif

@stop


