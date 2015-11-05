<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pages = Page::orderBy('sorter')->paginate(10);
        return view('admin.page.index',['pages'=>$pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $page = new Page;
        return view('admin.page.create',['page'=>$page]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PageRequest $request)
    {
        Page::create($request->all());
        return redirect('admin/pages')->withInput()->with(['message'=>trans('admin/pages.message.add_success')]);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        $page = Page::getBySlug($slug);
        return view('page.show',['page'=>$page]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.page.edit',['page'=>$page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(PageRequest $request, $id)
    {
       Page::find($id)->update($request->all());
       return redirect('admin/pages')->with(['message'=>trans('admin/pages.message.update_success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();
    }


    public function sort(Request $request)
    {
        $i=0;
        foreach($request->sorter as $id){
            $i++;
            $page = Page::find($id);
            $page->sorter = $i;
            $page->save();
        }

    }

    public function activate(Request $request,$id,$param)
    {
        $data[$param] = $request->checked;
        Page::find($id)->update($data);
    }

    public function chekUniqueSlug(Request $request)
    {
       $slug = strip_signs($request->slug);
       $page = Page::where('id','!=',$request->id)->getBySlug($slug);
         return (isset($page->id)) ? 1:0;
    }

}
