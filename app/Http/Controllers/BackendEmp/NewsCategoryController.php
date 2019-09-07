<?php

namespace App\Http\Controllers\BackendEmp;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news_categories = NewsCategory::all();
        return view('backend-admin.news-category.index',compact('news_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend-admin.news-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['name' => 'required|string|unique:news_categories,name',
            'slug' => 'required|string'],[],[ 'name' => ' หมวดหมู่','slug' => ' URL หมวดหมู่']);

        $new_category = new NewsCategory(
            [
                'name' => $request->get('name'),
                'slug' => $request->get('slug')
            ]
        );

        $new_category->save();
        return redirect()->route('news-category.index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
        $data = NewsCategory::find($id);
        return view('backend-admin.news-category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'required|string|unique:news_categories,name,'.$id,
                'slug' => 'required|string'
            ],[],
            [
                'name' => ' หมวดหมู่',
                'slug' => ' URL หมวดหมู่'
            ]);

        $news_category = NewsCategory::find($id);

        $data = [
          'name' => $request->name,
            'slug' =>$request->slug,
        ];


        $news_category->update($data);

        return redirect()->route('news-category.index')->withSuccess('แก้ไขหมวดหมู่สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new_category = NewsCategory::find($id);

        $new_category->delete();

        return redirect()->route('news-category.index')->with('deleted','แก้ไขหมวดหมู่สำเร็จ');

    }
}
