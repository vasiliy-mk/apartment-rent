<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Http\Controllers\Controller;
use App\Settings;


class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(!Settings::item('page_map')) abort(404);
        $apartment = Apartment::active()->where('map_lat','!=','')->where('map_lng','!=','')->paginate(50);
        return view('map.index',['apartments'=>$apartment]);
    }




}
