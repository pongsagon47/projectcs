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
                    <th width="60">ID</th>
                    <th width="120">หัวข้อ</th>
                    <th>รูปย่อ</th>
                    <th>คำอธิบายแบบย่อ</th>
                    <th>สถานะ</th>
                    <th width="120">หมวดหมู่</th>
                    <th width="180">Created at</th>
                    <th width="180">Updated at</th>
                    <th width="190">Action</th>
                </tr>
                </thead>
                @if(count($articales) != 0)
                @foreach( $articales as $articale)
                    <tbody style="font-size: 14px ; color: #110100">
                    <tr>
                        <td>{{ $articale->id }}</td>
                        <td>{{ $articale->title }}</td>
                        <td> <img width="100px" height="90" src="{{asset('storage/'.$articale->thumbnail_image)}}" alt=""></td>
                        <td>{{ $articale->short_description }}</td>
                        <td> {!! $articale->status == 'DRAFT' ? '<span class="badge badge-pill  badge-warning" style="color: white;font-size: 12px" >แบบร่าง</span>':'<span class="badge badge-pill  badge-success" style="color: white; font-size: 12px" >เผยแพร่</span>' !!}   </td>
                        <td>{{ $articale->news_category->name}}</td>
                        <td>{{ date('d/m/Y  เวลา H:i น.',strtotime($articale->created_at )) }}</td>
                        <td>{{ date('d/m/Y  เวลา H:i น.',strtotime($articale->updated_at )) }}</td>
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
                @else
                    <tbody class="text-center">
                    <tr>
                        <td colspan="9"><h5>ไม่มีข้อมูลข่าวสาร</h5></td>
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

