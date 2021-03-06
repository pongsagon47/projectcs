@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Emplpoyee List')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        {{--<h1 class="h3 mb-2 text-gray-800">Employee list</h1>--}}

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">ข้อมูลพนักงานทั้งหมด</h1>
        </div>

        <div class="row">
            <div class="col-md-2">
                <a href="{{route('employee.create')}}" class="btn btn-primary" style="margin-right: 40px">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">เพิ่มสมาชิก</span>
                </a>
            </div>
            <div class="col"></div>
            <div class="col-md-3">

                <form method="post" action="{{route('employee.search')}}" role="search">
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
            <div class="alert alert-success alert-dismissible fade show" role="alert"  style="margin-top: 20px">
                {{\Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(\Session('deleted'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert"  style="margin-top: 20px">
                {{\Session::get('deleted')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="table-responsive" style="margin-top: 25px">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead style="font-size: 15px; color: #fffdfd; background: linear-gradient(45deg, #219d1c, #bdff33);">
                <tr>
                    <th>ID</th>
                    <th>ชื่อพนักงาน</th>
                    <th>ตำแหน่ง</th>
                    <th>เพศ</th>
                    <th>Email</th>
                    <th>เบอร์โทรศัพท์</th>
                    <th>Action</th>
                </tr>
                </thead>
                @if(count($data) != 0)
                @foreach( $data as $value)
                    <tbody style="font-size: 14px; color: #110100">
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->first_name." ".$value->last_name }}</td>
                        <td>{{ $value->role_employee->name }}</td>
                        <td width="80">{{ null == $value->gender ?'ไม่มีการระบุเพศ' : $value->gender}} </td>
                        <td>{{ $value->email }}</td>
                        <td width="170">{{ $value->phone_number }}</td>
                        <td width="190">
                            <form class="delete_form" method="post" action="{{route('employee.delete',[$value->id])}}">
                                @csrf
                                <a href="{{route('employee.detail',[$value->id])}}" class="btn btn-info btn-circle" title="Detail Record">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{route('employee.edit',[$value->id])}}" class="btn btn-warning btn-circle" title="Edit Record">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <button type="submit" class="btn btn-danger btn-circle" title="Delete Record"
                                        {{count($value->orders) != 0 ? "disabled":""}}
                                        {{count($value->news) != 0 ? "disabled":""}}>
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
                        <td class="text-center" colspan="7">ไม่มีข้อมูลพนักงาน</td>
                    </tr>
                    </tbody>
                @endif
            </table>

            <div class="flex-center">
                {{ $data->render() }}
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
