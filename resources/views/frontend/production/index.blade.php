@extends('frontend.layouts.main')
@section('title','สินค้าของเรา')
@section('content')

    <section id="production-intro">
        <div class="production-text">
            <h2>ข้อมูลขนม</h2>
            <span class="production-text-divider"></span>
            <p>
                ข้อมูลและรายละเอียดขนมของบริษัท คิดถึงเบเกอรี่ ด้านล่างนี้ค่ะ
            </p>

            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('kidthuang.index') }}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ข้อมูลขนม</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section id="production">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="production-title">
                        <h2>ข้อมูลขนม</h2>
                        <span class="production-text-divider"></span>
                        <p>ขนมชนิดต่างๆของคิดถึงเบเกอรี่ มีมากมายหลายชนิดให้เลือกสรรค์</p>
                    </div>
                    <div class="row production-content" style="padding-top: 60px">
                        @foreach( $productions as $production)
                        <div class="col-md-3">
                            <div class="card gallery-item" style="width: 18rem">
                                <img src="{{asset('storage/'.$production->image) }}"height="280"  alt="">
                                <div class="card-body">
                                        <h5 class="card-title">{{$production->name}}</h5>
                                        <a href="{{route('kidthuang.production.detail',[$production->id])}}" class="btn btn-sm btn-primary">รายละเอียด</a>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
