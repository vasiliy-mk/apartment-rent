<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Cache;

class Settings extends Model
{

    protected $guarded = ['id'];
    private static  $cache_name  = 'settings';

    public static $default = [
        'country'         => 'Unated States',
        'city'            => 'New York',
        'language'        => 'en',
        'currency'        => 'usd',
        'company_name'    => 'My Company',
        'title'           => 'My Company',
        'description'     => 'Description for my Company',
        'contact_phones'  => ['555-555-555'],
        'contact_text'    => 'Please, contacts us',
        'skype'           => 'my.skype',
        'viber'           => 'my.viber',
        'email'           => 'email@my.company',
        'page_map'        => 1,
        'apartment_map'   => 1,
        'page_review'     => 1,
        'review_moderate' => 1,
        'review_create'   => 1,
        'review_to_email' => 1,
        'page_contact'    => 1,
        'contact_form'    => 1,
        'phones_active'   => 1,
        'skype_active'    => 1,
        'viber_active'    => 1,
    ];


    public static function getArray()
    {
        return Cache::remember(self::$cache_name, 0, function(){
           return self::makeArray();
        });
    }


    private static function makeArray()
    {
         $settings =   Settings::get()->toArray();
         // insert default settings if first run application

         if(!$settings){
               self::createDefault();
               User::createDefault();
               $arr = self::$default;

         }else{

             foreach ($settings as $item){
                 $name = $item['name'];
                 $array_value = json_decode($item['value']);
                 $value = ($array_value) ? $array_value : $item['value'];
                 $arr[$name] = $value;
             }
         }

         // Front navbar menu
         $arr['page_menu'] = Page::active()->where('to_menu',1)->orderBy('sorter')->get()->lists('name','slug');

         // admin credentials
         $user = User::find(1);
         $arr['name']        = $user->name;
         $arr['admin_email'] = $user->email;

         return $arr;
    }


    public static function item($key)
    {
        return self::getArray()[$key];
    }


    public static function removeCache()
    {
        Cache::forget(self::$cache_name);
    }
}
