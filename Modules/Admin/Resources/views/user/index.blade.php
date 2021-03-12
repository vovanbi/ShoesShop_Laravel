@extends('admin::layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Thành viên</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h3>Quản lý thành viên</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Stt</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
                @if(isset($users))
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <a class="btn btn-danger" style="font-size: 12px;" href="{{ route('admin.get.action.product',['delete',$user->id]) }}"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@stop
