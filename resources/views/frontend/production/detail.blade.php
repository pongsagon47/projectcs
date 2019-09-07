@extends('frontend.layouts.main')
@section('title','รายระเอียดสินค้าของเรา')
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
                        <li class="breadcrumb-item"><a href="{{ route('kidthuang.production.index') }}">ข้อมูลขนม</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $production->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section id="production-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="production-detail-title">
                        <h2>{{ $production->name }}</h2>
                        <span class="production-text-divider"></span>

                        <img id="myImg" src="{{asset('storage/'.$production->image)}}" alt="{{ $production->name }}" style="width:100%;max-width:300px">

                        <p style="padding-top: 30px">
                            ประเภทห้องผลิต : {{$production->role_employee->name}} <br>
                            ราคา : {{ $production->price }} <br>
                            คำอธิบาย : {{$production->description}}
                        </p>




                        <!-- The Modal -->
                        <div id="myModal" class="modal">
                            <span class="close">&times;</span>
                            <img style="width: 100%;height: 700px" class="modal-content" id="img01">
                            <div id="caption"></div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>


@endsection
@push('script')

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>

@endpush
