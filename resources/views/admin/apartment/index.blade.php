@extends('admin.layout')
@section('title')
{{trans('admin/apartment.index.apartments')}}
@stop
@section('resources')
<script src="{{Url()}}/public/js/apartment.js"></script>
<script src="{{Url()}}/public/js/ajax.search.js"></script>
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="heading-title">{{trans('admin/apartment.index.apartments')}}</span>
                <span id="count" title="{{trans('admin/apartment.index.rows_number')}}"></span>
                <div class="pull-right">
                    <a href="{{Url()}}/admin/apartment/create" class="create" title="{{trans('admin/apartment.index.add_apartment')}}"><i class="glyphicon glyphicon-plus"></i>{{trans('admin/apartment.index.add_apartment')}}</a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div id="preloader" class="preloader"><img src="{{URL()}}/public/images/preloader.gif" /></div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>{{trans('admin/apartment.index.id')}}</th>
                            <th>{{trans('admin/apartment.index.photo')}}</th>
                            <th>{{trans('admin/apartment.index.rooms')}}</th>
                            <th>{{trans('admin/apartment.index.price')}}</th>
                            <th>{{trans('admin/apartment.index.address')}}</th>
                            <th>{{trans('admin/apartment.index.slider')}}</th>
                            <th>{{trans('admin/apartment.index.active')}}</th>
                            <th>{{trans('admin/apartment.index.action')}}</th>
                        </tr>
                        <tr> <form name="form" id="form">
                                <td><input name="id" class="form-control input-sm input-text" style="width: 45px" type="text"/></td>
                                <td>
                                    <select name="photos" class="form-control input-sm input-select">
                                        <option>-</option>
                                        <option value="yes">{{trans('admin/apartment.index.yes')}}</option>
                                        <option value="no">{{trans('admin/apartment.index.no')}}</option>
                                    </select>
                                </td>
                                <td><input name="rooms" class="form-control input-sm input-text" style="width: 35px" type="text"/></td>
                                <td><input name="price" class="form-control input-sm input-text" style="width: 50px" type="text"/> </td>
                                <td><input  name="street" class="form-control input-sm input-text" type="text"  style="width: 100%"/> </td>
                                <td><select name="to_slider" class="form-control input-sm input-select">
                                        <option>-</option>
                                        <option value="yes">{{trans('admin/apartment.index.yes')}}</option>
                                        <option value="no">{{trans('admin/apartment.index.no')}}</option>
                                    </select>
                                </td>
                                <td><select name="active" class="form-control input-sm input-select">
                                        <option>-</option>
                                        <option value="yes">{{trans('admin/apartment.index.yes')}}</option>
                                        <option value="no">{{trans('admin/apartment.index.no')}}</option>
                                    </select>
                                </td>
                                <td>-</td>
                            </form>
                        </tr>
                        </thead>
                        <tbody  id="ajax_body">
                        @include('admin/apartment/_ajax_body')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop