<section id="intro">
    <div class="intro-text">
        <h2>{{array_get($intro,'0.title') == null ? 'ยินดีต้อนรับเข้าสู่ดินแดนขนม' : array_get($intro,'0.title')}}</h2>
        {!! array_get($intro,'0.description') == null ? ' <p>คิดถึงเบเกอรี่ ยินดีต้อนรับลูกค้าทุกท่านที่มา <br> เยี่ยมชมเว็บไซต์ และสนใจที่จะเป็นหนึ่งในครอบครัวคิดถึงเบเกอรี่ของเราขนมของเราล้วนสดใหม่ทุกวันไม่มีสารกันบูด</p>'
        : array_get($intro,'0.description') !!}

        <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>

    <div class="cake-one"  data-aos="fade-up">
        <img src="{{asset('img/cake/test1.png')}}" width="460" height="460" alt="">
    </div>


    {{--<div class="product-screens">--}}
        {{--<div class="product-screen-1" data-aos="fade-up" data-aos-delay="400">--}}
            {{--<img src="avilon/img/product-screen-2.png" alt="">--}}
        {{--</div>--}}

        {{--<div class="product-screen-2" data-aos="fade-up" data-aos-delay="200">--}}
            {{--<img src="avilon/img/product-screen-2.png" alt="">--}}
        {{--</div>--}}

        {{--<div class="product-screen-3" data-aos="fade-up">--}}
            {{--<img src="avilon/img/product-screen-3.png" alt="">--}}
        {{--</div>--}}
    {{--</div>--}}

</section>
