@extends('backend-admin.layouts.main_dashboard')
@section('title', 'Emplpoyee List')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Employee list</h1>

        <br>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style="font-size: 15px; color: #fffdfd; background-color: rgba(0,178,5,0.76)">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @foreach( $data as $value)
                        <tbody style="font-size: 14px">
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->first_name." ".$value->last_name }}</td>
                            <td width="80">{{ $value->gender }}</td>
                            <td>{{ $value->email }}</td>
                            <td width="170">{{ $value->phone_number }}</td>
                            <td width="190">
                                <form method="post" >
                                    @csrf
                                    <a href="{{route('employee.detail',[$value->id])}}" class="btn btn-info btn-circle" title="Detail Record">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a href="#" class="btn btn-warning btn-circle" title="Edit Record">
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
@endsection
