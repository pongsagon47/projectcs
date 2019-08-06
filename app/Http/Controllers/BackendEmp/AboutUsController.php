<?php

namespace App\Http\Controllers\BackendEmp;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{

    public function create()
    {
        $about = [];
        $oAbout = About::get();
        if ($oAbout->isNotEmpty()) {
            $about = $oAbout;
        }

        return view('backend-admin.about-us.index', compact('about'));
    }

    public function store(Request $request)
    {

        if (!empty($request->id))
        {
            $this->validate($request,[
                'image1' => 'mimes:jpeg,png|max:1024|nullable',
                'image2' => 'mimes:jpeg,png|max:1024|nullable',
                'image3' => 'mimes:jpeg,png|max:1024|nullable',
                'image4' => 'mimes:jpeg,png|max:1024|nullable',
                'image5' => 'mimes:jpeg,png|max:1024|nullable',
                'image6' => 'mimes:jpeg,png|max:1024|nullable',
            ],[],[
                'title' => 'หัวข้อ',
                'description' => 'คำอธิบาย',
                'image1' => ' รูปภาพที่ 1',
                'image2' => ' รูปภาพที่ 2',
                'image3' => ' รูปภาพที่ 3',
                'image4' => ' รูปภาพที่ 4',
                'image5' => ' รูปภาพที่ 5',
                'image6' => ' รูปภาพที่ 6',
            ]);

            $about = About::find($request->id);

            $about->title = $request->title;
            $about->description = $request->description;


            if (isset($request->image1)){

                Storage::delete('public/'.$about->image1);
                $about->image1 = $request->image1->store('uploads','public');
            }

            if (isset($request->image2)){

                Storage::delete('public/'.$about->image2);
                $about->image2 = $request->image2->store('uploads','public');
            }
            if (isset($request->image3)){

                Storage::delete('public/'.$about->image3);
                $about->image3 = $request->image3->store('uploads','public');
            }
            if (isset($request->image4)){

                Storage::delete('public/'.$about->image4);
                $about->image4 = $request->image4->store('uploads','public');
            }
            if (isset($request->image5)){

                Storage::delete('public/'.$about->image5);
                $about->image5 = $request->image5->store('uploads','public');
            }
            if (isset($request->image6)){

                Storage::delete('public/'.$about->image6);
                $about->image6 = $request->image6->store('uploads','public');
            }

            $about->update();
            return redirect()->route('about-us.create')->with('success','บันทึกข้อมูลเรียบร้อย');

        }
        else
        {
            $this->validate($request,[
                'image1' => 'required|mimes:jpeg,png|max:1024|nullable',
                'image2' => 'required|mimes:jpeg,png|max:1024|nullable',
                'image3' => 'required|mimes:jpeg,png|max:1024|nullable',
                'image4' => 'required|mimes:jpeg,png|max:1024|nullable',
                'image5' => 'required|mimes:jpeg,png|max:1024|nullable',
                'image6' => 'required|mimes:jpeg,png|max:1024|nullable',
            ],[],[
                'title' => 'หัวข้อ',
                'description' => 'คำอธิบาย',
                'image1' => ' รูปภาพที่ 1',
                'image2' => ' รูปภาพที่ 2',
                'image3' => ' รูปภาพที่ 3',
                'image4' => ' รูปภาพที่ 4',
                'image5' => ' รูปภาพที่ 5',
                'image6' => ' รูปภาพที่ 6',
            ]);

            $about = new About();

            $about->title = $request->title;
            $about->description = $request->description;
            $about->image1 = $request->image1->store('uploads','public');
            $about->image2 = $request->image2->store('uploads','public');
            $about->image3 = $request->image3->store('uploads','public');
            $about->image4 = $request->image4->store('uploads','public');
            $about->image5 = $request->image5->store('uploads','public');
            $about->image6 = $request->image6->store('uploads','public');


            $about->save();
            return redirect()->route('about-us.create')->with('success','บันทึกข้อมูลเรียบร้อย');
        }
    }
}
