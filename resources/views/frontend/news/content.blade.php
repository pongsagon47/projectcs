@extends('frontend.layouts.main')
@section('title','เนื้อหาข่าวสาร')
@section('content')

    <section id="about-title">
        <div class="about-text">
            <h2>ข้อมูลข่าวสาร</h2>
            <span class="about-text-divider"></span>
            <p>
                ข้อมูลข่าวสารเกี่ยวกับรบริษัทคิดถึงเบเกอรี่ ด้านล่างนี้ค่ะ
            </p>

            <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('kidthuang.index') }}">หน้าหลัก</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('kidthuang.news.index',['slug' => null ]) }}">ข่าวสาร</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('kidthuang.news.index',['slug' => $article->news_category->slug]) }}">{{ $article->news_category->name }}</a></li>
                            <li class="breadcrumb-item active">{{ $article->title }}</li>
                        </ol>
                    </nav>
            </div>
        </div>
    </section>

    <section id="news-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="category-menu d-flex pull-right" style="margin-top: 47px;">
                        <div class="category-text">
                            Category:
                        </div>
                        <div class="dropdown">
                            <button type="button" class="btn btn-category  dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                                {{ $article->news_category->name }}
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

                <div class="col-md-12 section-content">
                    <h2>{{$article->title}}</h2>
                    <p>
                        <i class="fas fa-user-edit"></i> {{ $article->employee->first_name." ".$article->employee->last_name }} &nbsp;&nbsp;
                        <i class="fas fa-calendar-alt"> </i> {{ date('วันที่ d/m/Y  เวลา H:iน.',strtotime($article->created_at)) }}
                    </p>
                    <hr>
                    <div class="flex-center">
                        <img style="max-width: 800px;max-height: 800px" src="{{ asset('storage/'.$article->cover_image) }}" alt="">
                    </div>
                    <p class="short-description">
                        {{ $article->short_description }}
                    </p>
                        {!! $article->description !!}


                </div>
                <div class="col-md-12" style="padding-top: 30px"><hr></div>
                <!-- Other News -->
                @if($relateArticles->isNotEmpty())

                    <div class="other-news mb-3" >
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



@endsection
