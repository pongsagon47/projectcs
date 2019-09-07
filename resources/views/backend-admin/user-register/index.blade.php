@extends('backend-admin.layouts.main_dashboard')
@section('title', 'User list')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">ข้อมูลลูกค้าที่สมัครสมาชิก</h1>
        </div>

        <div class="row">
            <div class="col"></div>
            <div class="col-md-3">

                <form method="post" action="{{route('user-register.search')}}" role="search">
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

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-top: 20px;background-color: white; ">
                <thead style="font-size: 15px; color: #fffdfd; background: linear-gradient(45deg, #289bff, #a5ffd5)">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Active</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
                </thead >
                @foreach( $users as $value)
                    <tbody style="font-size: 14px ; color: #110100">
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->first_name." ".$value->last_name }}</td>
                        <td width="80">{{ null == $value->gender ?'ไม่มีการระบุเพศ' : $value->gender }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ 0 == $value->status?"No":"Yes" }}</td>
                        <td width="170">{{ $value->phone_number }}</td>
                        <td width="280">
                            <form class="delete_form" method="post" action="{{route('user-register.confirm',[$value->id])}}">
                                @csrf

                                <a href="{{route('user-register.detail',[$value->id])}}" class="btn btn-info btn-circle" title="Detail Record">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <button type="submit" class="btn btn-success " title="Delete Record">
                                    <i class="fas fa-check-circle"></i> ยอมรับสมาชิก
                                </button>
                                {{method_field('PUT')}}
                            </form>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>

            <div class="flex-center">
                {{ $users->render() }}
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
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
