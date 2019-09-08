@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Promotion')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        {{--<h1 class="h3 mb-2 text-gray-800">Employee list</h1>--}}

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Promotion List</h1>
            <a href="{{route('promotion.create')}}" class="btn btn-primary btn-sm" style="margin-right: 40px">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                <span class="text">Create Promotion</span>
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
                    <th>ชื่อโปรโมชั่น</th>
                    <th>คำอธิบายโปรโมชั่น</th>
                    <th>ส่วนลด</th>
                    <th >Created at</th>
                    <th >Updated at</th>
                    <th >Action</th>
                </tr>
                </thead>
                @if(count($promotions) != 0)
                @foreach( $promotions as $promotion)
                    <tbody  style="font-size: 14px ; color: #110100">
                    <tr>
                        <td>{{ $promotion->id }}</td>
                        <td>{{ $promotion->promotion_name }}</td>
                        <td>{{ $promotion->promotion_description  }}</td>
                        <td>{{ $promotion->promotion_discount }} %</td>
                        <td>{{ $promotion->created_at }}</td>
                        <td>{{ $promotion->updated_at }}</td>
                        <td>
                            <form class="delete_form" method="post" action="{{route('promotion.delete',[$promotion->id])}}">
                                @csrf
                                <a href="{{route('promotion.edit',[$promotion->id])}}" class="btn btn-warning btn-circle" title="Edit Record" >
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="submit" class="btn btn-danger btn-circle " title="Delete Record" {{count($promotion->orders) == 0 ? '' : 'disabled'}}>
                                    <i class="fas fa-trash-alt"></i>
                                </button>

                                {{method_field('DELETE')}}
                            </form>
                        </td>

                    </tr>
                    </tbody>
                @endforeach
                @else
                    <tbody style="font-size: 16px ; color: #110100">
                    <tr>
                        <td class="text-center" colspan="7">ไม่มีข้อมูลโปรโมชั่น</td>
                    </tr>
                    </tbody>
                @endif

            </table>
        </div>

        <div class="flex-center">
            {{ $promotions->render() }}
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

