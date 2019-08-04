@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Product Category')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        {{--<h1 class="h3 mb-2 text-gray-800">Employee list</h1>--}}

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">รายการขนม</h1>

        </div>

        <div class="row">
            <div class="col-md-2">
                <a href="{{route('product.create')}}" class="btn btn-primary " style="margin-right: 40px">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">เพิ่มสินค้า</span>
                </a>
            </div>
            <div class="col"></div>
            <div class="col-md-3">

                <form method="post" action="{{route('product.search')}}" role="search">
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




        @if(\Session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 20px">
                {{\Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(\Session('deleted'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 20px">
                {{\Session::get('deleted')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endif

    <!-- DataTales Example -->
        <div class="card shadow mb-4" style="margin-top: 20px">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style="font-size: 14px; color: #fffdfd; background-color: rgba(0,178,5,0.76)">
                        <tr>
                            <th width="120">ID</th>
                            <th>Dessert Name</th>
                            <th width="190">price</th>
                            <th width="240">description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @foreach( $products as $product)
                            <tbody style="font-size: 14px">
                            <tr>
                                <td> {{ $product->id }}</td>
                                <td> {{ $product->name }}</td>
                                <td> {{ $product->price }}</td>
                                <td width="450"> {{ $product->description }}</td>
                                <td width="200">
                                    <form class="delete_form" method="post" action="{{route('product.delete',[$product->id])}}">
                                        @csrf
                                        <a href="{{route('product.show',[$product->id])}}" class="btn btn-info btn-circle" title="Detail Record">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a href="{{route('product.edit',[$product->id])}}" class="btn btn-warning btn-circle" title="Edit Record">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger btn-circle" title="Delete Record">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        {{method_field('DELETE')}}
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                    <div class="flex-center">
                        {{ $products->render() }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
@push('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.delete_form').on('submit',function () {
                if(confirm("Are you sure?")){
                    return true;
                }
                else {
                    return false;
                }
            })
        })
    </script>
@endpush

