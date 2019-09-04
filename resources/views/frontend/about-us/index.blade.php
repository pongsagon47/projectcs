@extends('frontend.layouts.main')
@section('title','เกี่ยวกับเรา')
@section('content')

    <section id="about-title">
        <div class="about-text">
            <h2>เกี่ยวกับเรา</h2>
            <span class="about-text-divider"></span>
            <p>
                ข้อมูลเกี่ยวกับร้านคิดถึงเบเกอรี่ ด้านล่างนี้ค่ะ
            </p>

            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('kidthuang.index') }}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active" aria-current="page">เกี่ยวกับเรา</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section id="about-content">
        <div class="about-content-text">

            <h2>{{array_get($about,'0.title') == null ? 'คิดถึงเบเกอรี่  ยินดีต้อนรับ' : array_get($about,'0.title')}}</h2>
            <span class="about-content-divider"></span>

            {!!   array_get($about,'0.description') == null ? '<p> คิดถึงเบเกอรี่เป็นร้านจำหน่ายขนมที่ใหญ่ที่สุดในบรุรีรัมย์ มีร้านสาขาทั่วจอำเภอเมืองบุรีรัมย์ <br> และมีรายการขนมมากกว่าหนึ่งร้อยชนิด </p>'
             : array_get($about,'0.description') !!}

        </div>
    </section>

    <section id="gallery" style="padding-top: 10rem">
        <div class="container-fluid">
            <div class="section-header">
                <h3 class="section-title">รูปภาพ</h3>
                <span class="section-divider"></span>
                <p class="section-description">รูปภาพเกี่ยวกับเรา</p>
            </div>

            <div class="row no-gutters">

                @if(array_get($about,'0.image1') != null)

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item" data-aos="fade-up">
                            <a href="{{asset('storage/'.array_get($about,'0.image1')) }}" class="gallery-popup">
                                <img src="{{asset('storage/'.array_get($about,'0.image1')) }}" alt="">
                            </a>
                        </div>
                    </div>

                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item" data-aos="fade-up">
                        <a href="{{asset('storage/'.array_get($about,'0.image2')) }}" class="gallery-popup">
                            <img src="{{asset('storage/'.array_get($about,'0.image2')) }}" alt="">
                        </a>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item" data-aos="fade-up">
                        <a href="{{asset('storage/'.array_get($about,'0.image3')) }}" class="gallery-popup">
                            <img src="{{asset('storage/'.array_get($about,'0.image3')) }}" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item" data-aos="fade-up">
                        <a href="{{asset('storage/'.array_get($about,'0.image4')) }}" class="gallery-popup">
                            <img src="{{asset('storage/'.array_get($about,'0.image4')) }}" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item" data-aos="fade-up">
                        <a href="{{asset('storage/'.array_get($about,'0.image5')) }}" class="gallery-popup">
                            <img src="{{asset('storage/'.array_get($about,'0.image5')) }}" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item" data-aos="fade-up">
                        <a href="{{asset('storage/'.array_get($about,'0.image6')) }}" class="gallery-popup">
                            <img src="{{asset('storage/'.array_get($about,'0.image6')) }}" alt="">
                        </a>
                    </div>
                </div>

                @endif

            </div>

        </div>
    </section><!-- #gallery -->

    <section id="about-footer"></section>


@endsection
