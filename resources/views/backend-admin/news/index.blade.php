@extends('backend-admin.layouts.main_dashboard')
@section('title', 'News')
@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">ข่าวสาร</h1>
            <a href="{{route('news.create')}}" class="btn btn-primary btn-sm" style="margin-right: 40px">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                <span class="text">เพิ่มข่าวสาร</span>
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
                    <th>Title</th>
                    <th>Thumbnail Image</th>
                    <th>short_description</th>
                    <th>status</th>
                    <th>Category</th>
                    <th width="190">Created at</th>
                    <th width="190">Updated at</th>
                    <th width="240">Action</th>
                </tr>
                </thead>
                @foreach( $articales as $articale)
                    <tbody style="font-size: 14px ; color: #110100">
                    <tr>
                        <td>{{ $articale->id }}</td>
                        <td>{{ $articale->title }}</td>
                        <td> <img width="100px" height="90" src="{{asset('storage/'.$articale->thumbnail_image)}}" alt=""></td>
                        <td>{{ $articale->short_description }}</td>
                        <td> {!! $articale->status == 'DRAFT' ? '<span class="badge badge-pill  badge-warning" style="color: white;font-size: 12px" >แบบร่าง</span>':'<span class="badge badge-pill  badge-success" style="color: white; font-size: 12px" >เผยแพร่</span>' !!}   </td>
                        <td>{{ $articale->news_category->name}}</td>
                        <td>{{ $articale->created_at }}</td>
                        <td>{{ $articale->updated_at }}</td>
                        <td>
                            <form class="delete_form" method="post" action="{{route('news.delete',[$articale->id])}}">
                                @csrf

                                <a href="{{route('news.edit',[$articale->id])}}" class="btn btn-warning btn-circle" title="Edit Record">
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

