<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;
use App\Apartment;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $apartment     = Apartment::active()->orderBy('id','DESC')->paginate(12);
        $slider_photos = Apartment::sliderPhotoArray();
        return view('index',[
            'apartments'    => $apartment,
            'slider_photos' => $slider_photos,
        ]);
    }



}
