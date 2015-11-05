
<!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#main" aria-controls="main" role="tab" data-toggle="tab">{{trans('admin/apartment.form.general')}}</a></li>
                <li role="presentation"><a href="#amenity" aria-controls="amenity" role="tab" data-toggle="tab">{{trans('admin/apartment.form.amenity')}}</a></li>
                <li role="presentation"><a href="#photo" aria-controls="photo" role="tab" data-toggle="tab">{{trans('admin/apartment.form.photo')}}</a></li>
                <li role="presentation"><a href="#map" aria-controls="map" role="tab" data-toggle="tab">{{trans('admin/apartment.form.map')}}</a></li>
                <li role="presentation"><a href="#seo" aria-controls="seo" role="tab" data-toggle="tab">{{trans('admin/apartment.form.seo')}}</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="main">@include('admin/apartment/_form/_main')</div>
                <div role="tabpanel" class="tab-pane" id="amenity">@include('admin/apartment/_form/_amenity')</div>
                <div role="tabpanel" class="tab-pane" id="photo">@include('admin/apartment/_form/_photo')</div>
                <div role="tabpanel" class="tab-pane" id="map">@include('admin/apartment/_form/_map')</div>
                <div role="tabpanel" class="tab-pane" id="seo">@include('admin/apartment/_form/_seo')</div>
            </div>
                    <button type="submit" id="submit" class="btn btn-primary apartment-btn">{{$button_name}}</button>

<script>
    jQuery(function($){

        CKEDITOR.replace('description',ckeditor_settings); // settings

        // photo uploader for Photos section
        $("#file").change(function(){
            upload(this.files,domain_url+'/admin/apartment/uploader');
        });
        // remove uploaded photo for Photos section
        $(document).on('click','.remove',function(){
            $(this).parent().fadeOut(200, function() {
                $(this).remove();
            });
        });

        // sortable for Photos section
        $( "#output" ).sortable();

        // form validator for Main section
        $("#submit").click(function(){
            var result = vv_validator.validate({
                form: '#form',
                required_arr: ['street','rooms', 'beds','price']
            });
            if(!result) return false;
        });





    });
</script>