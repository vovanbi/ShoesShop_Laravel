@extends('admin::layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Bài viết</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h3>Quản lý bài viết <a href="{{ route('admin.get.create.article') }}" ><i class="fa fa-plus-circle"></i></a> </h3>
        <table id="dtBasicExample" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th style="width: 20%;">Tên bài viết</th>
                    <th style="width: 100px;">Hình ảnh</th>
                    <th style="width: 300px;">Mô tả</th>
                    <th>Nổi bật</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($articles))
                @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->a_name }}</td>
                        <td>
                            <img src="{{ asset(pare_url_file($article->a_avatar)) }}" class="img img-responsive" style="width: 100px;height: 80px;">
                        </td>
                        <td><p style="-webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
    display: -webkit-box;">{{ $article->a_description_seo }}</p></td>
                        <td>
                            <a href="{{ route('admin.get.action.article',['hot',$article->id]) }}" class="label {{ $article->getHot($article->a_hot)['class'] }}">{{ $article->getHot($article->a_hot)['name'] }}</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.get.action.article',['active',$article->id]) }}" class="label {{ $article->getStatus($article->a_active)['class'] }}">{{ $article->getStatus($article->a_active)['name'] }}</a>
                        </td>
                        <td>{{ $article->created_at }}</td>
                        <td>
                            <a class="btn btn-info" style="font-size: 12px" href="{{ route('admin.get.edit.article',$article->id) }}"><i class="fa fa-pencil"></i> Cập nhật</a>
                            <a class="btn btn-danger" style="font-size: 12px" href="{{ route('admin.get.action.article',['delete',$article->id]) }}"><i class="fa fa-trash"></i> Delete</a>
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
