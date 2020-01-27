@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Show Product')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">

                <div class="card" style="margin-top: 20px">
                    <div class="card-header" style="text-align: center; font-size: 19px; background: linear-gradient(45deg, #219d1c, #bdff33)">
                        ข้อมูลขนม
                    </div>
                    <div class="card-body">

                        <div class="row justify-content-center">
                            <div class="col-md-11">
                                <div class="pull-right">

                                </div>

                                <div class="form-group row" >

                                    <div class="col-md-12 ">

                                        @if($data->image == null)
                                            <img class="center " style="width: 190px ; height: 180px;margin-top: 35px" src="https://via.placeholder.com/180x120.png?text=No%20Image" alt="">

                                        @else
                                            <img class="center " id="myImg" src="{{asset('storage/'.$data->image)}}" alt="{{ $data->name }}" style="width:100%;max-width:300px">
{{--                                            <img class="center rounded-circle" style="width: 200px ; height: 180px;margin-top: 35px" src="{{asset('storage/'.$data->image)}}" alt="">--}}
                                        @endif

                                    </div>

                                    <div class="col-md-12 text-center" style="margin-top: 20px">

                                        <label><strong>ชื่อสินค้า: </strong> {{$data->name}}</label>

                                    </div>
                                    <div class="col-md-12 text-center">

                                        <label><strong>ราคา: </strong> {{$data->price}}</label>

                                    </div>
                                    <div class="col-md-12 text-center">

                                        <label><strong>ประเภทห้องผลิตสินค้า: </strong> {{$data->role_employee->name}}</label>

                                    </div>


                                    <div class="col-md-12 text-center">

                                        <label><strong>รายระเอียดสินค้า: </strong> {{ $data->description }}</label>

                                    </div>
                                    <div class="col-md-12 text-center">

                                            <label><strong>เพิ่มสินค้า: </strong> {{ $data->created_at }}</label>

                                    </div>
                                    <div class="col-md-12 text-center">

                                            <label><strong>อัพเดตสินค้า: </strong> {{ $data->updated_at }}</label>

                                    </div>

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
                </div>
                <div class="pull-right" style="margin-top: 22px ">
                    <a href="๒" onclick="history.go(-1)" class="btn btn-primary "> back </a>
                </div>

            </div>
        </div>
    </div>

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
