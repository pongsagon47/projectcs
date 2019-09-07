@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Product Category')
@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">หมวดหมู่ข่าวสาร</h1>
            <a href="{{route('news-category.create')}}" class="btn btn-primary btn-sm" style="margin-right: 40px">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                <span class="text">เพิ่มหมวดหมู่</span>
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

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color: white">
                <thead style="font-size: 14px; color: #fffdfd; background: linear-gradient(45deg, #219d1c, #bdff33)">
                <tr>
                    <th width="120">ID</th>
                    <th>Name</th>
                    <th>URL</th>
                    <th width="190">Created at</th>
                    <th width="190">Updated at</th>
                    <th width="240">Action</th>
                </tr>
                </thead>
                @if(count($news_categories) != 0 )
                    @foreach( $news_categories as $news_category)
                        <tbody style="font-size: 14px ; color: #110100">
                        <tr>
                            <td>{{ $news_category->id }}</td>
                            <td>{{ $news_category->name }}</td>
                            <td>{{ $news_category->slug }}</td>
                            <td>{{ $news_category->created_at }}</td>
                            <td>{{ $news_category->updated_at }}</td>
                            <td>
                                <form class="delete_form" method="post" action="{{route('news-category.delete',[$news_category->id])}}">
                                    @csrf
                                    <a href="{{route('news-category.edit',[$news_category->id])}}" class="btn btn-warning btn-circle" title="Edit Record" >
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-circle " title="Delete Record" {{count($news_category->news) != 0 ? "disabled":""}}>
                                        <i class="fas fa-trash-alt"></i>
                                    </button>

                                    {{method_field('DELETE')}}
                                </form>
                            </td>

                        </tr>
                        </tbody>
                    @endforeach
                @else
                    <tbody class="text-center" >
                    <tr>
                        <td  colspan="6"><h5>  ไม่มีข้อมูลหมวดหมู่ข่าวสาร </h5></td>
                    </tr>
                    </tbody>
                @endif

            </table>
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

