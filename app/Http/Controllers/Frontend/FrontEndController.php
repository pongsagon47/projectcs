<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Intro;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontEndController extends Controller
{

    public function index()
    {
        $about = About::all();
        $intro = Intro::all();
        $articles = News::query()
            ->where('status', 'published')
            ->where('created_at', '<=', Carbon::now())
            ->with('news_category')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.index.index ',compact('about','intro','articles'));
    }


}
