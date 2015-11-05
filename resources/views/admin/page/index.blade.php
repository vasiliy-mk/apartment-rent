@extends('admin.layout')
@section('title')
{{trans('admin/pages.index.pages')}}
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="heading-title">{{trans('admin/pages.index.pages')}}</span>
                <span id="count"  title="{{trans('admin/pages.index.rows_number')}}">{{$pages->total()}}</span>
                <div class="pull-right">
                    <a href="{{Url()}}/admin/page/create" class="create" title="{{trans('admin/pages.index.add_page')}}"><i class="glyphicon glyphicon-plus"></i>{{trans('admin/pages.index.add_page')}}</a>
                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <form id="form">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>{{trans('admin/pages.index.name')}}</th>
                            <th>{{trans('admin/pages.index.menu')}}</th>
                            <th>{{trans('admin/pages.index.active')}}</th>
                            <th class="option-btns">{{trans('admin/pages.index.action')}}</th>
                        </tr>
                        </thead>
                        <tbody class="sortable">
                        @foreach($pages as $page)
                          <tr>
                              <td><a href="{{Url()}}/{{$page->slug}}">{{$page->name}}</a></td>
                              <td class="td-checkbox">
                                  <input name="to_menu"  title="{{trans('admin/pages.index.add_to_menu')}} {{$page->name}}" class="to_menu" type="checkbox" value="{{Url()}}/admin/page/{{$page->id}}/to_menu/activate"  {{set_checked($page->to_menu)}}>
                              </td>
                              <td class="td-checkbox">
                                  <input name="active"  title="{{trans('admin\pages.index.activate')}} {{$page->name}}" class="activate" type="checkbox" value="{{Url()}}/admin/page/{{$page->id}}/active/activate"  {{set_checked($page->active)}}>
                              </td>
                              <td class="option-btns">
                                    <a href="{{Url()}}/admin/page/{{$page->id}}/edit" title="{{trans('admin\pages.index.edit')}} {{$page->name}}"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a class="destroy-btn" href="{{Url()}}/admin/page/{{$page->id}}/destroy"  title="{{trans('admin\pages.index.remove')}} {{$page->id}}"><i class="glyphicon glyphicon-remove"></i></a>
                                  <input type="hidden" name="sorter[]" value="{{$page->id}}"/>
                               </td>
                          </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </form>
                     <div>{!!$pages->setPath('')->render()!!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(".sortable").sortable({
        stop: function(){
            postSorter('#form',domain_url+'/admin/page/sort')
        }
    });
</script>

@stop













