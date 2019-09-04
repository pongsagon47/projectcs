@extends('frontend.layouts.main')
@section('title','เกี่ยวกับเรา')
@section('content')
    <section id="contact-intro">
        <div class="contact-intro-text">
            <h2 class="">ติดต่อเรา</h2>
            <span class="contact-intro-divider"></span>
            <p>
                ต้องการสอบถามข้อมูลเพิ่มเติมเกี่ยวกับระบบทำเว็บไซต์ สามารถติดต่อเราได้ตามช่องทางต่างๆ ด้านล่างนี้ค่ะ
            </p>

            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('kidthuang.index') }}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ติดต่อเรา</li>
                    </ol>
                </nav>
            </div>

        </div>
    </section>
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-text">
                            <h2>ศูนย์บริการลูกค้า</h2>
                            <span class="contact-text-divider"></span>
                        <div class="row">
                            <div class="col-md-6">
                                <h3>หมายเลขโทรศัพท์</h3>
                                <h4><a href="tel:+66963626596"> 096-362-6596</a></h4>
                                <p> เปิดทุกวัน 7.00-18.00 น.</p>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>เกี่ยวกับ</h3>
                                        <p> instagram : kidthuangbakery <br>
                                            line id : poon_pp <br>
                                            facebook : <a href="https://www.facebook.com/kidthuangbakery/">www.facebook.com/kidthuangbakery</a></p>
                                    </div>
                                    <div class="col-md-6">
                                        <h3>ข้อมูลทั่วไป/สมัครสมาชิก</h3>
                                        <h4><a href="{{route('kidthuang.index')}}"> kidthuang_bekery.loc</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img class="" src="{{asset('img/cake/shop.jpg')}}">
                            </div>
                        </div>
                    </div>
                    <div class="contact-address">
                        <h2>แผนที่บริษัท</h2>
                        <span class="contact-text-divider"></span>

                        <div class="row">
                            <div class="col-md-6">
                                <h3>บริษัท คิดถึงเบเกอรี่ จำกัด</h3>
                                <p> 631 หมู่1 ตำบลอิสาณ อำเภอเมือง จังหวัดบุรีรัมย์ <br>
                                    Muang Buriram, Buriram, Thailand</p>


                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>

                </div>
                <div id="map"> </div>
            </div>
        </div>
    </section>
@endsection
@push('script')

    <script>
        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            var kidthuang = {lat: 14.985620, lng: 103.115774};
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 17, center: kidthuang});
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({position: kidthuang, map: map});
        }
    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6ZfzPjlZogveeC7_1nLJGn2h5diiHu98&callback=initMap">
    </script>

@endpush
