@extends('admin::layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Liên hệ</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h3>Quản lý liên hệ</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Stt</th>
                <th>Tiêu đề</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Nội dung</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($contacts))
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->c_title }}</td>
                        <td>{{ $contact->c_name }}</td>
                        <td>{{ $contact->c_email }}</td>
                        <td>{{ $contact->c_content }}</td>
                        <td>
                            <a href="{{ route('admin.action.contact',['status',$contact->id]) }}" class="label {{ $contact->getStatus($contact->c_status)['class'] }}">{{ $contact->getStatus($contact->c_status)['name'] }}</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" style="font-size: 12px;" href="{{ route('admin.action.contact',['delete',$contact->id]) }}"><i class="fa fa-pen"></i> Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@stop
