<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="form-group">
                <label for="pro_name"> Tên bài viết:</label>
                <input type="text" class="form-control" placeholder="Tên bài viết" value="{{ old('a_name',isset($article->a_name) ? $article->a_name : '') }}" name="a_name" >
                @if($errors->has('a_name'))
                    <span class="error-text">
                        {{ $errors->first('a_name') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name"> Nội dung:</label>
                <textarea class="form-control" id="" cols="30" rows="3" placeholder="Mô tả ngắn sản phẩm" name="a_content">{{ old('a_content',isset($article->a_content) ? $article->a_content : '') }}</textarea>
                @if($errors->has('a_content'))
                    <span class="error-texta{{ $errors->first('a_content') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name"> Title:</label>
                <input type="text" class="form-control" placeholder="Title" value="{{ old('a_title_seo',isset($article->a_title_seo) ? $article->a_title_seo : '') }}" name="a_title_seo" >
            </div>
            <div class="form-group">
                <label for="name"> Mô tả:</label>
                <input type="text" class="form-control" placeholder="Mô tả" value="{{ old('a_description_seo',isset($article->a_description_seo) ? $article->a_description_seo : '') }}" name="a_description_seo" >
            </div>
            <div class="form-group">
                <label for="name"> Avatar:</label>
                <input type="file" name="avatar" class="form-control">
            </div>
            <button type="submit" class="btn btn-success"> Lưu thông tin</button>
        </div>
    </div>

</form>
