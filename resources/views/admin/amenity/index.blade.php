@extends('admin.layout')
@section('title')
{{trans('admin/amenity.index.amenity')}}
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="heading-title">{{trans('admin/amenity.index.amenity')}}</span>
                <span id="count" title="{{trans('admin/amenity.index.rows_number')}}">{{$amenities->total()}}</span>
                <div class="pull-right">
                    <a href="{{Url()}}/admin/amenity/create" class="create" title="{{trans('admin/amenity.index.add_amenity')}}"><i class="glyphicon glyphicon-plus"></i>{{trans('admin/amenity.index.add_amenity')}}</a>
                </div>

            </div>
            <div class="panel-body">
                <div class="row">
                    <form id="form">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>{{trans('admin/amenity.index.name')}}</th>
                            <th>{{trans('admin/amenity.index.active')}}</th>
                            <th class="option-btns">{{trans('admin/amenity.index.action')}}</th>
                        </tr>
                        </thead>
                        <tbody class="sortable">
                        @foreach($amenities as $amenity)
                          <tr>
                              <td>{{$amenity->name}}</td>
                              <td class="td-checkbox">
                                  <input name="active"  title="{{trans('admin/amenity.index.activate')}} {{$amenity->name}}" class="activate" type="checkbox" value="{{Url()}}/admin/amenity/{{$amenity->id}}/active/activate" {{set_checked($amenity->active)}} >
                              </td>
                              <td class="option-btns">
                                    <a href="{{Url()}}/admin/amenity/{{$amenity->id}}/edit" title="{{trans('admin/amenity.index.edit')}} {{$amenity->name}}"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a class="destroy-btn" href="{{Url()}}/admin/amenity/{{$amenity->id}}/destroy"  title="{{trans('admin/amenity.index.remove')}} {{$amenity->name}}"><i class="glyphicon glyphicon-remove"></i></a>
                                  <input type="hidden" name="sorter[]" value="{{$amenity->id}}"/>
                              </td>
                          </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </form>
                     <div>{!!$amenities->setPath('')->render()!!}</div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(".sortable").sortable({
        stop: function(){
            postSorter('#form',domain_url+'/admin/amenity/sort');
        }
    });
 </script>


@stop













