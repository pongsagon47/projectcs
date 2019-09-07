<?php

namespace App\Http\Controllers\BackendEmp;

use App\Http\Requests\NewsEditRequest;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articales = News::all();
        return view('backend-admin.news.index',compact('articales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news_categories = NewsCategory::all();
        return view('backend-admin.news.create',compact('news_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {

        $news = new News();

        $news->title = $request->title;
        $news->employee_id = auth()->user()->id ;
        $news->news_category_id = $request->news_category_id;
        $news->short_description = $request->short_description;
        $news->description = $request->description;
        $news->status = $request->status;
        $news->cover_image = $request->cover_image->store('uploads','public');
        $news->thumbnail_image = $request->thumbnail_image->store('uploads','public');

        $news->save();
        return redirect()->route('news.index')->withSuccess('เพิ่มข่าวสำเร็จ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news_categories = NewsCategory::all();
        $article = News::find($id);
        return view('backend-admin.news.edit',compact('news_categories','article'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsEditRequest $request, $id)
    {
        $news = News::find($id);

        $news->title = $request->title;
        $news->employee_id = auth()->user()->id ;
        $news->news_category_id = $request->news_category_id;
        $news->short_description = $request->short_description;
        $news->description = $request->description;
        $news->status = $request->status;

        if (isset($request['cover_image'])){
            Storage::delete('public/'.$news->cover_image);
            $news->cover_image = ($request['cover_image'])->store('uploads','public');
        }

        if (isset($request['thumbnail_image'])){
            Storage::delete('public/'.$news->thumbnail_image);
            $news->thumbnail_image = ($request['thumbnail_image'])->store('uploads','public');
        }

        $news->update();
        return redirect()->route('news.index')->withSuccess('แก้ไขข่าวสำเร็จ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);

        $news->delete();
        Storage::delete('public/'.$news->cover_image);
        Storage::delete('public/'.$news->thumbnail_image);

        return redirect()->route('news.index')->with('deleted','ลบข่าวสารเรียบร้อย');
    }
}
