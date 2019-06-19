@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Product Category')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        {{--<h1 class="h3 mb-2 text-gray-800">Employee list</h1>--}}

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Product Category List</h1>
            <a href="{{route('product_category.create')}}" class="btn btn-primary btn-sm" style="margin-right: 40px">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                <span class="text">Create Product Category</span>
            </a>
        </div>

        @if(\Session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{\Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(\Session('deleted'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{\Session::get('deleted')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endif

    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style="font-size: 14px; color: #fffdfd; background-color: rgba(0,178,5,0.76)">
                        <tr>
                            <th width="120">ID</th>
                            <th>Title</th>
                            <th width="190">Created at</th>
                            <th width="190">Updated at</th>
                            <th width="240">Action</th>
                        </tr>
                        </thead>
                        @foreach( $product_categories as $product_category)
                            <tbody style="font-size: 14px">
                            <tr>
                                <td>{{ $product_category->id }}</td>
                                <td>{{ $product_category->title }}</td>
                                <td>{{ $product_category->created_at }}</td>
                                <td>{{ $product_category->updated_at }}</td>
                                <td>
                                    <form class="delete_form" method="post" action="{{route('product_category.delete',[$product_category->id])}}">
                                        @csrf
                                        <a href="{{route('product_category.edit',[$product_category->id])}}" class="btn btn-warning btn-circle" title="Edit Record" >
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-circle " title="Delete Record" {{count($product_category->products) == 0 ? '' : 'disabled'}}>
                                            <i class="fas fa-trash-alt"></i>
                                        </button>

                                        {{method_field('DELETE')}}
                                    </form>
                                </td>

                            </tr>
                            </tbody>
                        @endforeach

                    </table>
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

