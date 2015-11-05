<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Amenity;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AmenityRequest;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $amenity = Amenity::orderBy('sorter')->paginate(100);
        return view('admin.amenity.index',['amenities'=>$amenity]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $amenity = new Amenity;
        return view('admin.amenity.create',['amenity'=>$amenity]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(AmenityRequest $request)
    {
        Amenity::create($request->all());

        return back()->with(['message'=>trans('admin/amenity.message.add_success')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $amenity = Amenity::orderBy('sorter')->find($id);
        return view('admin.amenity.edit',['amenity'=>$amenity]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(AmenityRequest $request, $id)
    {
        Amenity::find($id)->update($request->all());
        return redirect('admin/amenities')->with(['message'=>trans('admin/amenity.message.update_success')]);
    }

    public function activate(Request $request,$id,$param)
    {
        $data[$param] = $request->checked;
        Amenity::find($id)->update($data);
    }


    public function sort(Request $request)
    {
        $i=0;
        foreach($request->sorter as $id){
            $i++;
            $amenity = Amenity::find($id);
            $amenity->sorter = $i;
            $amenity->save();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $amenity = Amenity::find($id);
        $amenity->apartments()->detach();
        $amenity->delete();
    }
}
