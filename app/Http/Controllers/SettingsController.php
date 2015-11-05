<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.settings.index');
    }

    public function update(Request $request)
    {
        $data = $request->all();
        foreach(Settings::$default as $name=>$key){
            if(isset($data[$name])){
                $data[$name] = (is_array($data[$name])) ? json_encode($data[$name]) : $data[$name];
                Settings::where('name',$name)->update(['value'=>$data[$name]]);
            }
        }

        $user_data = [
            'name'     => $data['name'],
            'email'    => $data['admin_email'],
        ];

        if($data['password']){

           if($data['password'] != $data['password_confirm']){
               return back()->withErrors(trans('admin/settings.message.password_not_match'));
           }

           $user_data['password'] = bcrypt($data['password']);
        }

        User::find(1)->update($user_data);


        return back()->with(['message'=>trans('admin/settings.message.update_success')]);
    }


}
