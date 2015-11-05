<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Settings;

use App\Http\Requests;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    public function index()
    {
        if(!Settings::item('page_contact')) abort(404);
        return view('contact.index',[]);
    }

    public function store(ContactRequest $request)
    {
        if(!Settings::item('page_contact') or !Settings::item('contact_form')) abort(404);

        $data = [
            'name'        => $request->name,
            'title'       => 'Laravel5: '.$request->title,
            'text'        => $request->text,
            'email'       => $request->email,
            'admin_email' => Settings::item('admin_email'),
        ];
        Mail::send('emails.contact', $data, function ($message) use ($data){
            $message->from($data['email'],$data['name']);
            $message->subject($data['title']);
            $message->to($data['admin_email']);
        });

        return back()->with(['message'=>trans('front/contact.send_success')]);
    }

}
