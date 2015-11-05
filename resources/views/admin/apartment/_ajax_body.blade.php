@foreach($apartments as $apartment)
    <tr class="valign-middle">
        <td>{{$apartment->id}}</td>
        <td>
            <a href="{{Url('/apartment/'.$apartment->id).add_slug($apartment->slug)}}" title="{{trans('admin/apartment.index.look')}}">
                <img src="{{App\Apartment::firstPhoto($apartment->photos,$apartment->id)}}" width="50" alt=""/>
            </a>
        </td>
        <td>{{$apartment->rooms}}</td>
        <td>{{$apartment->price}}</td>
        <td>{{$apartment->street}}, {{$apartment->house}}</td>
        <td class="td-checkbox"><input name="to_slider" title="{{trans('admin/apartment.index.add_to_slider')}} №{{$apartment->id}}" class="to_slider" type="checkbox" value="{{Url()}}/admin/apartment/{{$apartment->id}}/to_slider/activate"
            {{set_checked($apartment->to_slider)}}></td>
        <td class="td-checkbox"><input name="active" title="{{trans('admin/apartment.index.activate')}} №{{$apartment->id}}" class="activate" type="checkbox" value="{{Url()}}/admin/apartment/{{$apartment->id}}/active/activate"  @if($apartment->active) checked @endif /></td>
        <td class="option-btns">
            <a title="{{trans('admin/apartment.index.edit')}}  №{{$apartment->id}}"  href="{{Url()}}/admin/apartment/{{$apartment->id}}/edit"><i class="glyphicon glyphicon-edit"></i></a>
            <a title="{{trans('admin/apartment.index.remove')}}  №{{$apartment->id}}"  class="destroy-btn" href="{{Url()}}/admin/apartment/{{$apartment->id}}/destroy"><i class="glyphicon glyphicon-remove"></i></a>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="8">
            {!!$apartments->setPath('')->render()!!}
    </td>
 </tr>
<script>
    jQuery(function($){
        $('#count').text('{!!$apartments->total()!!}');
    });
</script>