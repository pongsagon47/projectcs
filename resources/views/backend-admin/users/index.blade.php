@extends('backend-admin.layouts.main_dashboard')
@section('title', 'User list')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User list</h1>
            <a href="{{route('user.create')}}" class="btn btn-primary" style="margin-right: 40px">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                <span class="text">Create User</span>
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
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style="font-size: 15px; color: #fffdfd; background-color: rgba(67,184,255,0.76)">
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
                        @foreach( $data as $value)
                            <tbody style="font-size: 14px">
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->first_name." ".$value->last_name }}</td>
                                <td width="80">{{ null == $value->gender ?'ไม่มีการระบุเพศ' : $value->gender }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ 0 == $value->status?"No":"Yes" }}</td>
                                <td width="170">{{ $value->phone_number }}</td>
                                <td width="190">
                                    <form class="delete_form" method="post" action="{{route('user.delete',[$value->id])}}">
                                        @csrf
                                        <a href="{{route('user.detail',[$value->id])}}" class="btn btn-info btn-circle" title="Detail Record">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a href="{{route('user.edit',[$value->id])}}" class="btn btn-warning btn-circle" title="Edit Record">
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
