<div class="panel panel-default border-top-none">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <h4><label><input type="checkbox" id="main_checkbox"/> {{trans('admin/apartment.form.select_all')}}</label></h4>
                    @foreach(App\Amenity::getArray() as $name=>$id)
                    <div class="col-xs-6">
                        <label>
                         <input type="checkbox" name="amenity[]" class="check" value="{{$id}}" @if(in_array($id,$amenities)) checked @endif /> {{$name}}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
