@if(array_get($about,'0.image1') != null)
<section id="gallery">
    <div class="container-fluid">
        <div class="section-header">
            <h3 class="section-title">อัลบั้ม</h3>
            <span class="section-divider"></span>
            <p class="section-description">รูปภาพเกี่ยวกับเรา</p>
        </div>

        <div class="row no-gutters">



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
        </div>

    </div>
</section><!-- #gallery -->
@endif
