<?php

namespace App\Http\Controllers\Frontend;

use App\Models\News;
use App\Models\NewsCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index($slug = null)
    {

//        $category = NewsCategory::query()->where('title',$title)->get();
//        $id = array_get($category,'0.id');

        $category = null;
        $categories = $this->getAllCategories();
        $query_articles = News::where('status', 'published')
            ->where('updated_at', '<=', Carbon::now())
            ->with('news_category')
            ->orderBy('updated_at', 'desc');

        if ($slug != null) {
            $category = NewsCategory::query()->where('slug', $slug)->first();
            if ($category == null) {
                return redirect()->route('kidthuang.news.index');
            }
        }

        if ($category != null) {
            $query_articles->where('news_category_id', $category->id);
        }

        $articles = $query_articles->paginate(5);
        $article_ids = $articles->pluck('id')->toArray();

        $query_relate_articles = News::where('status', 'PUBLISHED')
            ->where('updated_at', '<=', Carbon::now())
            ->orderBy('updated_at', 'desc');


        $relateArticles = $query_relate_articles->whereNotIn('id', $article_ids)->limit(4)->get();

        return view('frontend.news.index',compact('articles','relateArticles','categories','category'));
    }

    public  function content($id)
    {
        $categories = $this->getAllCategories();
        $article = News::query()->where('id',$id)->first();

        $article_ids = [$id];

        $query_relate_articles = News::where('status', 'PUBLISHED')
            ->where('updated_at', '<=', Carbon::now())
            ->orderBy('updated_at', 'desc');



        $relateArticles = $query_relate_articles->whereNotIn('id', $article_ids)->limit(4)->get();

        return view('frontend.news.content',compact('categories','article','relateArticles'));
    }

    protected function getAllCategories()
    {
        return NewsCategory::all();
    }

}
