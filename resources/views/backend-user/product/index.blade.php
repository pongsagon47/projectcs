@extends('backend-user.layouts.main_dashboard')
@section('title', 'product')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        {{--<h1 class="h3 mb-2 text-gray-800">Employee list</h1>--}}

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">รายการขนม</h1>

        </div>

        <div class="row">

            <div class="col"></div>
            <div class="col-md-3">

                <form method="post" action="{{route('product-list.search')}}" role="search">
                    @csrf
                    <div class="input-group" style="margin-right: 80px">
                        <input type="text" name="search" class="form-control" placeholder="ค้นหา" value="{{$search}}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                   style="margin-top: 20px;background-color: white">
                <thead style="font-size: 14px; color: #fffdfd; background: linear-gradient(45deg, #ff9913, #ffe764);">
                <tr>
                    <th width="90">ID</th>
                    <th>Dessert Name</th>
                    <th width="120">price</th>
                    <th width="190">type</th>
                    <th width="350">description</th>
                    <th>Action</th>
                </tr>
                </thead>
                @if(count($products) != 0)
                    @foreach( $products as $product)
                        <tbody style="font-size: 14px ; color: #110100">
                        <tr>
                            <td> {{ $product->id }}</td>
                            <td> {{ $product->name }}</td>
                            <td> {{ $product->price }} บาท</td>
                            <td> {{ $product->role_employee->name }}</td>
                            <td> {{ $product->description }}</td>
                            <td width="200">
                                <a href="{{route('product-list.show',[$product->id])}}" class="btn btn-info "
                                   title="Detail Record">
                                    <i class="fas fa-eye"></i> รายระเอียด
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                @else
                    <tbody style="font-size: 16px ; color: #110100">
                    <tr>
                        <td class="text-center" colspan="6">ไม่มีข้อมูลขนม</td>
                    </tr>
                    </tbody>
                @endif
            </table>

        </div>


        <div class="flex-center">
            {{ $products->render() }}
        </div>
    </div>
@endsection

