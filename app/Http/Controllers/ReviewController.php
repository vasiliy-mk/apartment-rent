<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Http\Requests;
use App\Http\Requests\ReviewRequest;
use App\Http\Controllers\Controller;
use App\Settings;
use Mail;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(!Settings::item('page_review')) abort(404);
        $review = Review::where('active',1)->orderBy('id','DESC')->paginate(10);
        return view('review.index',['reviews'=>$review]);
    }


    public function adminIndex()
    {
        $review = Review::orderBy('id','DESC')->paginate(10);
        return view('admin.review.index',['reviews'=>$review]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $review = new Review;
        return view('admin.review.create',['review'=>$review]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ReviewRequest $request)
    {
        $settings = Settings::getArray();

        if(!$settings['page_review'] or !$settings['review_create']) abort(404);

        $data = $request->all();
        $data['ip']     =  $request->server('REMOTE_ADDR');
        $data['active'] = ($settings['review_moderate']) ? 0:1;

        Review::create($data);

        // sending notification
      //  if(!Settings::item('page_contact') or !Settings::item('contact_form')) abort(404);

        if($settings['review_to_email']){

             $data['name']        = $settings['company_name'];
             $data['subject']     = $settings['company_name'].'| New review added';
             $data['admin_email'] = $settings['admin_email'];

             Mail::send('emails.review', $data, function ($message) use ($data){
                $message->subject($data['subject']);
                $message->to($data['admin_email']);
             });
        }

        return back()->with(['message'=>trans('admin/reviews.message.add_success')]);
    }

    public function adminStore(Request $request)
    {
        Review::create($request->all());
        return redirect('admin/reviews')->with(['message'=>trans('admin/reviews.message.add_success')]);
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
        $review = Review::find($id);
       return view('admin.review.edit',['review'=>$review]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        Review::find($id)->update($request->all());
        return redirect('admin/reviews')->with(['message'=>trans('admin/reviews.message.update_success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Review::find($id)->delete();
    }

    public function activate(Request $request,$id,$param)
    {
        $data[$param] = $request->checked;
        Review::find($id)->update($data);
    }


    public function action(Request $request)
    {
      $review = Review::whereIn('id',$request->checkbox);
        switch($request->action){
            case 'activate'   : $review->update(['active'=>1]); break;
            case 'deactivate' : $review->update(['active'=>0]); break;
            case 'destroy'    : $review->delete(); break;
        }

        return back();
    }



}
