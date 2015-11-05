<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    protected $guarded = ['id'];


    public static function getArray()
    {

        return Amenity::where('active',1)->orderBy('sorter')->lists('id','name');
    }


    public function apartments()
    {
        return $this->belongsToMany('App\Apartment');
    }
}
