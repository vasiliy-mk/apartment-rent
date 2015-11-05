<div class="col-lg-3 col-md-4 col-xs-6 apartment-block">
    <div class="panel panel-default apartment hover-buttons-container">
        <div class="panel-body">
            @if(Auth::check())
            <div class="hover-buttons">
                <a href="{{Url()}}/admin/apartment/{{$apartment->id}}/edit" target="_blank"><i class="glyphicon glyphicon-edit"></i></a>
            </div>
            @endif

                  <div class="hover-id">
                      {{trans('front/apartment.id')}}: <span>{{$apartment->id}}</span>
                   </div>

                     <a href="{{Url('/apartment/'.$apartment->id).add_slug($apartment->slug)}}" title="Смотреть">
                        <img class="apartment_ico" src="{{App\Apartment::firstPhoto($apartment->photos,$apartment->id)}}" alt=""/>
                    </a>

               <div class="row">
                 <div class="col-xs-2 price">
                     <span>{{$apartment->price}}</span>  {{trans('admin/settings.main.'.$settings['currency'])}}
                 </div>
                    <div class="col-xs-9">
                       <div class="street"><a href="{{Url('/apartment/'.$apartment->id).add_slug($apartment->slug)}}">{{$apartment->street}}, {{$apartment->house}}</a></div>
                    <div class="params">
                        {{trans('front/index.rooms')}}: <span>{{$apartment->rooms}}</span>
                        {{trans('front/index.beds')}}: <span>{{$apartment->beds}}</span>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
