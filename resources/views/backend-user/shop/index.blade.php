@extends('backend-user.layouts.main_dashboard')
@section('title', 'shop')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">สั่งรายการขนม</h1>
                </div>

                <div class="form-group">
                    @foreach($role_employees as $role_employee )
                        <a class="btn btn-primary " href="{{'#'.$role_employee->name}}">{{ $role_employee->name }}</a>
                    @endforeach
                </div>


                <div class="card">

                    <div class="card-body">
                        <div class="form-row ">
                            <div class="col-md-12">
                                <form method="post" action="{{route('shop.order')}}">
                                    @csrf

                                    @foreach($role_employees as $role_employee )

                                        <h4 id="{!!$role_employee->name!!}">ประเภท{{ $role_employee->name}}</h4>

                                        <?php
                                            $products = \App\Models\Product::query()
                                                        ->where('role_employee_id',$role_employee->id)
                                                        ->get();
                                        ?>
                                        @foreach($products as $product)

                                            <input type="hidden" name="product_id_{{$product->id}}" value="{{$product->id}}" >
                                            <div class="form-group row">
                                                <label for="qty"
                                                       class="col-sm-8 col-form-label">{{$product->name}} <small>( ราคา {{$product->price}} บาทต่อชิ้น )</small>
                                                </label>

                                                <div class="col-sm-2">
                                                    <input type="number" name="product_qty_{{$product->id}}" class="form-control" id="qty">
                                                </div>
                                                <label for="qty"
                                                       class="col-sm-2 col-form-label">ชิ้น</label>
                                            </div>

                                            <input type="hidden" name="product_name_{{$product->id}}" value="{{$product->name}}" >
                                            <input type="hidden" name="product_price_{{$product->id}}" value="{{$product->price}}" >

                                        @endforeach
                                        <hr>
                                    @endforeach

                                    <input class="btn-block btn btn-primary" type="submit" value="สั่งซื้อ">

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

