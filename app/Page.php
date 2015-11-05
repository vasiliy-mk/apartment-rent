<?php
namespace App;
use App\Libs\VVFileUpload;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = ['id'];


    public function scopeGetBySlug($query,$slug)
    {
        return $query->where('slug',$slug)->first();
    }

    public function scopeActive($query,$active=1)
    {
        return $query->where('active',$active);
    }

    public function setSlugAttribute($slug)
    {
        $this->attributes['slug'] = strip_signs($slug);
    }
}
