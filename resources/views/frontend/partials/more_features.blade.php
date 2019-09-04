<!--==========================
      More Features Section
    ============================-->
<section id="more-features" class="section-bg">
    <div class="container">

        <div class="section-header more-features-text">
            <h3 class="section-title">ข่าวสาร</h3>
            <span class="section-divider"></span>
            <p class="section-description">ข้อมูลข่าวสารใหม่ๆ เกี่ยวกับบริษัทคิดถึงเบเกอรี่</p>
        </div>

        <div class="row">

            @if(array_get($articles,'0.thumbnail_image') != null)
                <div class="col-md-6">
                    <div class="card" data-aos="fade-right">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{asset('storage/'.array_get($articles,'0.thumbnail_image'))}}"
                                     class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ array_get($articles,'0.title')}}</h5>
                                    <p class="card-text">{{array_get($articles,'0.short_description') }}</p>
                                    <a class="btn btn-primary btn-sm" href="{{ route('kidthuang.news.content',[array_get($articles,'0.id')]) }}">Read More</a>
                                    <p class="card-text">
                                        <small class="text-muted">Last
                                            updated {{ date('วันที่ d/m/Y  เวลา H:iน.',strtotime( array_get($articles,'0.updated_at'))) }}
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(array_get($articles,'1.thumbnail_image') != null)
                <div class="col-md-6">
                    <div class="card" data-aos="fade-left">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{asset('storage/'.array_get($articles,'1.thumbnail_image'))}}"
                                     class="card-img"
                                     alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ array_get($articles,'1.title')}}</h5>
                                    <p class="card-text">{{array_get($articles,'1.short_description') }}</p>
                                    <a class="btn btn-primary btn-sm" href="{{ route('kidthuang.news.content',[array_get($articles,'1.id')]) }}">Read More</a>
                                    <p class="card-text">
                                        <small class="text-muted">Last
                                            updated {{ date('วันที่ d/m/Y  เวลา H:iน.',strtotime( array_get($articles,'1.updated_at'))) }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endif

            @if(array_get($articles,'2.thumbnail_image') != null)
                <div class="col-md-6" style="padding-top: 3rem">
                    <div class="card" data-aos="fade-right">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{asset('storage/'.array_get($articles,'2.thumbnail_image'))}}"
                                     class="card-img"
                                     alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ array_get($articles,'2.title')}}</h5>
                                    <p class="card-text">{{array_get($articles,'2.short_description') }}</p>
                                    <a class="btn btn-primary btn-sm" href="{{ route('kidthuang.news.content',[array_get($articles,'2.id')]) }}">Read More</a>
                                    <p class="card-text">
                                        <small class="text-muted">Last
                                            updated {{ date('วันที่ d/m/Y  เวลา H:iน.',strtotime( array_get($articles,'2.updated_at'))) }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(array_get($articles,'3.thumbnail_image') != null)
                <div class="col-md-6" style="padding-top: 3rem">
                    <div class="card" data-aos="fade-left">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{asset('storage/'.array_get($articles,'3.thumbnail_image'))}}"
                                     class="card-img"
                                     alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ array_get($articles,'3.title')}}</h5>
                                    <p class="card-text">{{array_get($articles,'3.short_description') }}</p>
                                    <a class="btn btn-primary btn-sm" href="{{ route('kidthuang.news.content',[array_get($articles,'3.id')]) }}">Read More</a>
                                    <p class="card-text">
                                        <small class="text-muted">Last
                                            updated {{ date('วันที่ d/m/Y  เวลา H:iน.',strtotime( array_get($articles,'3.updated_at'))) }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>

    </div>
</section><!-- #more-features -->
