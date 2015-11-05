<?php

namespace App;
use App\Libs\VVFileUpload;
use Illuminate\Database\Eloquent\Model;
use Image;

class Apartment extends Model
{
    protected $guarded = ['id','file','amenity'];
    protected static $temp_folder = 'public/images/_temp';
    protected static $apartment_folder = 'public/images/apartments';

// set Attributes section


    public function scopeSliderOrId($query,$id)
    {
        if($id){
            return $query->where('id',$id);
        }

        return $query->where('to_slider',1);
    }

    public function scopeActive($query,$active=true)
    {
       return $query->where('active',$active);
    }

    public function scopeSlug($query,$slug)
    {
        if($slug) return $query->where('slug',$slug);
    }


    public function scopeNameValue($query,$name,$value)
    {
        if($value) return $query->where($name,$value);
    }

    public function scopeYesNo($query,$name,$value)
    {
        if($value=='yes')  return $query->where($name,1);
        if($value=='no')   return $query->where($name,0);
    }

    public function scopeLike($query,$name,$value)
    {
        if($value) return $query->where($name,'LIKE','%'.trim($value).'%');
    }

    public function scopePhotos($query,$value)
    {
        if($value=='yes')  return $query->where('photos','!=','');
        if($value=='no')   return $query->where('photos','');
    }

    public function setSlugAttribute($slug)
    {
        $this->attributes['slug'] = strip_signs($slug);
    }



    public static function  ajaxSearch($request)
    {
        return self::
            nameValue('id',$request->id)
            ->nameValue('rooms',$request->rooms)
            ->nameValue('price',$request->price)
            ->photos($request->photos)
            ->yesNo('to_slider',$request->to_slider)
            ->yesNo('active',$request->active)
            ->like('street',$request->street)
            ->orderBy('id','DESC')
            ->paginate(15);
    }


// Slider for Home page and single apartment page
    public static function  sliderPhotoArray($text=true,$slide=true,$id=false)
    {
        $apartments = Apartment::sliderOrId($id)->active()->get();
        $currency = Settings::item('currency');
        $photos['path'] = [];
        $photos['slide'] = $slide;

        foreach($apartments as $apartment){
            if($id){
               $photos['path'] =  array_pluck( self::photoArray($apartment->photos,$apartment->id),'path' ); // show apartment page
            }else{
                $photos['path'][] = self::firstPhoto($apartment->photos,$apartment->id,false); // home page
            }

            if($text)  $photos['text'][] = '<a href="'.Url('/apartment/'.$apartment->id).add_slug($apartment->slug).'">'.$apartment->street.', '
                .$apartment->house.' <br /> '
                .$apartment->price.' '.trans('admin/settings.main.'.$currency).'/'.trans('front/apartment.night').'</a>';
        }
        $photos['count'] = count($photos['path']);
        return $photos;

    }


    // shows the full path to first photo of an apartment or no photo image.
    public static function  firstPhoto($photos,$id,$ico=true)
    {
        if($photos){
            $photos = json_decode($photos);
            $ico  = ($ico) ? 'ico_':'';
            return Url().'/'.self::$apartment_folder.'/'.$id.'/'.$ico.$photos[0];
        }else{
            return Url().'/public/images/no_photo.png';
        }
    }


    public static function  photoArray($photos,$id)
    {
        if($photos){
           $photos =  json_decode($photos);
            foreach($photos as $photo){
                $arr[] =[
                    'name' => $photo,
                    'path' => url().'/'.self::$apartment_folder.'/'.$id.'/'.$photo,
                    'ico'  => url().'/'.self::$apartment_folder.'/'.$id.'/ico_'.$photo
                ];
            }
            return $arr;
        }
    }


// upload photos from user
    public static function  uploader()
    {
        $arr = [];
        $image_folder ='public/images/_temp';
        $file  = new VVFileUpload();
        $file->setMaxFileSize('5m');
        $file->setMaxfileUploads(20);
        $file->setAllowedFiles(['.jpg','.png']);
        $file->setDestination($image_folder);
        $res =   $file->upload();

        if(isset($res['file_name'])){
            foreach($res['file_name'] as $photo){
                $src_file     = self::$temp_folder.'/'.$photo;
                $out_file_ico = self::$temp_folder.'/ico_'.$photo;

                Image::make($src_file)->fit(250,190)->save($out_file_ico); // generate an icon
                Image::make($src_file)->fit(700,500)->save($src_file);

                $arr[] =[
                    'name' => $photo,
                    'ico'  => url().'/'.$out_file_ico
                ];
            }
        }

        return [
            'errors' => $file->getErrors(),
            'photos' => $arr
        ];
    }


    // checks if some photos are missing and  physicaly removes them
    public static function removePhotoFromApartments($photos,$id)
    {
        $apartment = Apartment::where('id',$id)->get(['photos'])->first();
        if($apartment->photos){
            if(!$photos) $photos = [];

            $removed = array_diff(json_decode($apartment->photos),$photos);
            foreach($removed as $photo){
              @unlink(self::$apartment_folder.'/'.$id.'/'.$photo);
              @unlink(self::$apartment_folder.'/'.$id.'/ico_'.$photo);
            }
        }
    }

    // moves new photos from _temp folder to images/apartment id folder
    public static function  movePhotoToApartments($photos,$id)
    {
        if($photos){
            if(!is_dir(self::$apartment_folder.'/'.$id)){
                mkdir(self::$apartment_folder.'/'.$id);
            }
            foreach($photos as $photo){
                $src_file     = self::$temp_folder.'/'.$photo;
                $out_file     = self::$apartment_folder.'/'.$id.'/'.$photo;

                $src_file_ico = self::$temp_folder.'/ico_'.$photo;
                $out_ico_file = self::$apartment_folder.'/'.$id.'/ico_'.$photo;

                if(file_exists($src_file)){;
                   rename($src_file,$out_file);
                   rename($src_file_ico,$out_ico_file);
                }
            }
        }
    }


    public static function  deleteDirectory($id)
    {
       delete_directory(self::$apartment_folder.'/'.$id);
    }


    public function amenities()
    {
        return $this->belongsToMany('App\Amenity');
    }

}
