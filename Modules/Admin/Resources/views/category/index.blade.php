@extends('admin::layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Danh mục</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h3>Quản lý danh mục <a href="{{ route('admin.get.create.category') }}" ><i class="fa fa-plus-circle"></i></a> </h3>
        <table id="dtBasicExample" class="table table-striped table-sm" cellspacing="0" width="100%">
            <thead>
            <tr>
              <th class="th-sm">Stt

              </th>
              <th class="th-sm">Tên danh mục

              </th>
              <th class="th-sm">Tiêu đề

              </th>           
              <th class="th-sm">Hiện trang chủ

              </th>
              <th class="th-sm">Trạng thái

              </th>
              <th class="th-sm">Thao tác

              </th>
            </tr>
            </thead>
            <tbody>
                @if(isset($categories))
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->c_name }}</td>
                            <td>{{ $category->c_title_seo }}</td>
                            <td>
                                <a href="{{ route('admin.get.action.category',['home',$category->id]) }}" class="label {{ $category->getHome($category->c_home)['class'] }}">{{ $category->getHome($category->c_home)['name'] }}</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.get.action.category',['active',$category->id]) }}" class="label {{ $category->getStatus($category->c_active)['class'] }}">{{ $category->getStatus($category->c_active)['name'] }}</a>
                            </td>
                            <td>
                                <a class="btn btn-info" style="font-size: 12px;" href="{{ route('admin.get.edit.category',$category->id) }}"><i class="fa fa-pencil"></i> Cập nhật</a>
                                <a class="btn btn-danger" style="font-size: 12px;" href="{{ route('admin.get.action.category',['delete',$category->id]) }}"><i class="fa fa-trash"></i> Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@stop
@section('script')
<script>
  // Basic example
$(document).ready(function () {
  $('#dtBasicExample').DataTable({
    "pagingType": "simple_numbers" // "simple" option for 'Previous' and 'Next' buttons only
  });
  $('.dataTables_length').addClass('bs-select');
});
</script>
@stop



