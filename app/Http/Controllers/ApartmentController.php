<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Http\Controllers\Controller;
use App\Settings;


class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $apartment = Apartment::paginate(50);
           return view('admin.apartment.index',['apartments'=>$apartment]);
    }


    public function adminIndex(Request $request)
    {
        $apartment = Apartment::ajaxSearch($request);
        $arr = ['apartments'=>$apartment];

        if ($request->ajax()) {
            return response()->json(view('admin.apartment._ajax_body',$arr)->render());
        }

        return view('admin.apartment.index',$arr);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $apartment = new Apartment;
        return view('admin.apartment.create',['apartment'=>$apartment]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data           = $request->all();
        $data['photos'] = ($request->photos) ? json_encode($request->photos) : '';

        $apartment = Apartment::create($data);
        Apartment::movePhotoToApartments($request->photos,$apartment->id);

        if($request->amenity){
            $apartment->amenities()->sync($request->amenity);
        }

        return redirect('admin/apartments')->with(['message'=>trans('admin/apartment.message.add_success')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id,$slug='')
    {
        $apartment = Apartment::active()->findOrFail($id);

        if($apartment->slug != $slug) abort(404);

        $amenities = $apartment->amenities()->orderBy('sorter')->where('active', 1)->get()->lists('id','name')->toArray();
        $slider_photos = Apartment::sliderPhotoArray(false,false,$id);

        return view('apartment.show',[
            'apartment'     => $apartment,
            'amenities'     => $amenities,
            'slider_photos' => $slider_photos,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
         $apartment = Apartment::find($id);
         $amenities = $apartment->amenities()->where('active', 1)->get()->lists('id','name')->toArray();
         $photos = Apartment::photoArray($apartment->photos,$apartment->id);
          return view('admin.apartment.edit',[
              'apartment' => $apartment,
              'amenities' => $amenities,
              'photos'    => $photos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
            $data           = $request->all();
            $data['photos'] = ($request->photos) ? json_encode($request->photos) : '';
            $amenity        = ($request->amenity) ? $request->amenity : [];

             Apartment::removePhotoFromApartments($request->photos,$id); // removes deleted photos
             Apartment::movePhotoToApartments($request->photos,$id);
             Apartment::find($id)->amenities()->sync($amenity);
             Apartment::find($id)->update($data);

          return redirect('admin/apartments')->with(['message'=>trans('admin/apartment.message.update_success')]);
    }

    public function activate(Request $request,$id,$param)
    {
        $data[$param] = $request->checked;
         Apartment::find($id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $apartment = Apartment::find($id);
        $apartment->amenities()->detach();
        $apartment->delete();
        Apartment::deleteDirectory($id);
    }

    /**
     * Uploads new apartment photos
     *
     *
     * @return Response
     */
    public function uploader()
    {
        $photos = Apartment::uploader();
         return view('admin.apartment._img_container',[
             'photos' => $photos['photos'],
             'errors' => $photos['errors']
         ]);
    }
}
