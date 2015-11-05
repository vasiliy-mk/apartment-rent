@extends('admin.layout')
@section('title')
{{trans('admin/reviews.index.reviews')}}
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="heading-title">{{trans('admin/reviews.index.reviews')}}</span>
                <span id="count" title="{{trans('admin/reviews.index.rows_number')}}">{{$reviews->total()}}</span>
                <div class="pull-right">
                    <a href="{{Url()}}/admin/review/create" class="create" title="{{trans('admin/reviews.index.add_review')}}"><i class="glyphicon glyphicon-plus"></i>{{trans('admin/reviews.index.add_review')}}</a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <form action="{{Url()}}/admin/review/action" id="form" method="post">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="main_checkbox"/></th>


                            <th>{{trans('admin/reviews.index.text')}}</th>
<!--                            <th>ip</th>-->


                            <th>{{trans('admin/reviews.index.active')}}</th>
                            <th class="option-btns">{{trans('admin/reviews.index.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reviews as $review)
                        <tr>
                        <td> <input type="checkbox" name="checkbox[]" class="check" value="{{$review->id}}" /></td>
                        <td>
                           <p class="review-title"> {{$review->id}} |
                            {{$review->name}} |
                            {{$review->email}} |
                            {{$review->ip}} |
                            {{$review->created_at}}
                           </p>
                            {{$review->text}}
                        </td>
                        <td class="td-checkbox">
                          <input title="{{trans('admin/reviews.index.activate')}} {{$review->name}}" class="activate" type="checkbox" value="{{Url()}}/admin/review/{{$review->id}}/active/activate"  {{set_checked($review->active)}}>
                       </td>
                        <td class="option-btns">
                           <a  title="{{trans('admin/reviews.index.edit')}} № {{$review->id}}" href="{{Url()}}/admin/review/{{$review->id}}/edit"><i class="glyphicon glyphicon-edit"></i></a>
                           <a class="destroy-btn"  title="{{trans('admin/reviews.index.remove')}} № {{$review->id}}" href="{{Url()}}/admin/review/{{$review->id}}/destroy"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                        <div class="select-action form-inline">
                            <i class="glyphicon glyphicon-arrow-up"></i>
                            <select name="action" id="action" class="form-control input-sm">
                                <option value="activate">{{trans('admin/reviews.index.activate')}}</option>
                                <option value="deactivate">{{trans('admin/reviews.index.deactivate')}}</option>
                                <option value="destroy">{{trans('admin/reviews.index.remove')}}</option>
                            </select>

                            <button type="submit" id="submit_action" class="btn btn-sm btn-primary">{{trans('admin/reviews.index.execute')}}</button>
                        </div>

                        <div align="right">{!!$reviews->setPath('')->render()!!}</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(function($){
        $(document).on('click','#submit_action',function(){
            if($('#action').val() == 'destroy'){
                if(!confirm('{{trans('admin/reviews.index.remove_selected')}}')) return false;
            }
        });
    });

</script>
@stop


