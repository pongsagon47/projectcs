@extends('frontend.layouts.main')
@section('title','ข่าวสาร')
@section('content')

    <section id="about-title">
        <div class="about-text">
            <h2>ข้อมูลข่าวสาร</h2>
            <span class="about-text-divider"></span>
            <p>
                ข้อมูลข่าวสารเกี่ยวกับรบริษัทคิดถึงเบเกอรี่ ด้านล่างนี้ค่ะ
            </p>

            <div class="container">
                @if(request()->segment(2) === null)
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('kidthuang.index') }}">หน้าหลัก</a></li>
                            <li class="breadcrumb-item active">ข่าวสาร</li>
                        </ol>
                    </nav>
                @else
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('kidthuang.index') }}">หน้าหลัก</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('kidthuang.news.index') }}">ข่าวสาร</a></li>
                            @if(request()->segment(2) != null)
                                <li class="breadcrumb-item active">
                                    {{ $category->name }}
                                </li>
                            @endif
                        </ol>
                    </nav>
                @endif
            </div>


        </div>
    </section>

    <section id="news-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class=" mb4 float-left" style="margin-top: 30px;">
                        <h1>News</h1>
                    </div>

                    <div class="category-menu d-flex pull-right" style="margin-top: 47px;">
                        <div class="category-text">
                            Category:
                        </div>
                        <div class="dropdown">
                            <button type="button" class="btn btn-category  dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                                @if(request()->segment(2) != null)
                                    {{ $category->name }}
                                @else
                                    all
                                @endif
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                <a class="dropdown-item" href="{{ route('kidthuang.news.index',['slug' => null ]) }}">All</a>

                                @foreach($categories as $category)
                                    <a class="dropdown-item"
                                       href="{{ route('kidthuang.news.index',['slug' => $category->slug]) }}">
                                        {{ $category->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    @foreach($articles as $article)
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <a href="{{ route('kidthuang.news.content',[$article]) }}" class="item-image">
                                            <img class="img-fluid rounded"
                                                 src="{{ asset('storage/'.$article->thumbnail_image) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="col-lg-7">
                                        <h2 class="card-title">{{ $article->title }}</h2>
                                        <div class="item-meta text-muted">
                                            <i class="fas fa-calendar-alt"> </i><span>
                                                {{ date('วันที่ d/m/Y  เวลา H:iน.',strtotime($article->updated_at)) }}</span>
                                        </div>
                                        <hr/>
                                        <p class="card-text">
                                            {{ $article->short_description }}
                                        </p>
                                        <a href="{{ route('kidthuang.news.content',[$article]) }}" class="btn btn-readmore">
                                            Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="col-lg-12">
                    <ul class="pagination justify-content-center" href="#">
                        {{ $articles->links() }}
                    </ul>
                </div>

                <!-- Other News -->
                @if($relateArticles->isNotEmpty())
                    <div class="other-news mb-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Other News</h2>
                                    <div class="row">
                                        @foreach($relateArticles as $relateArticle)
                                            <div class="col-md-3 col-sm-6">
                                                <a href="{{ route('kidthuang.news.content',[$relateArticle]) }}" class="item-image">
                                                    <img class="img-fluid rounded"
                                                         src="{{ asset('storage/'.$relateArticle->thumbnail_image) }}" alt="">
                                                </a>
                                                <br>
                                                <a href="{{ route('kidthuang.news.content',[$relateArticle]) }}">{{ $relateArticle->title }}</a>
                                                <div class="text-muted">
                                                    <i class="fas fa-calendar-alt"> </i><span> {{ date('วันที่ d/m/Y  เวลา H:iน.',strtotime($relateArticle->updated_at)) }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>

    @if(count($articles) == 0)
    <h1 style="margin: 60px 0 0 0;text-align: center"> ไม่มีข่าวสาร </h1>
    <p style="margin: 120px 60px 0 0;"> &nbsp;</p>
    @endif



@endsection
