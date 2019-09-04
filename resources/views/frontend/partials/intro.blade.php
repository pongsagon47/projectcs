<section id="intro">
    <div class="intro-text">
        <h2>{{array_get($intro,'0.title') == null ? 'ยินดีต้อนรับเข้าสู่ดินแดนขนม' : array_get($intro,'0.title')}}</h2>
        {!! array_get($intro,'0.description') == null ? ' <p>คิดถึงเบเกอรี่ ยินดีต้อนรับลูกค้าทุกท่านที่มา <br> เยี่ยมชมเว็บไซต์ และสนใจที่จะเป็นหนึ่งในครอบครัวคิดถึงเบเกอรี่ของเราขนมของเราล้วนสดใหม่ทุกวันไม่มีสารกันบูด</p>'
        : array_get($intro,'0.description') !!}

        <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>

    <div class="cake-screens">
        <div class="cake-screens-1" data-aos="fade-up">
            <img src="{{asset('img/cake/test1.png')}}" alt="">
        </div>
    </div>

</section>
