@if(isset($articles))
    @foreach($articles as $article)
        <div class="article" style="padding-bottom: 10px;margin-bottom: 10px; border-bottom: 1px solid #ccc;display: flex">
            <div class="article_avatar">
                <a href="{{ route('get.detail.article',[$article->a_slug,$article->id]) }}">
                    <img src="{{ asset(pare_url_file($article->a_avatar)) }}" alt="" style="width: 200px;height: 120px;">
                </a>
            </div>
            <div class="article_info" style="width: 80%; margin-left: 20px;position: relative;">
                <h2 style="font-size: 14px;"><a href="{{ route('get.detail.article',[$article->a_slug,$article->id]) }}">{{ $article->a_name }}</a></h2>
                <p style="-webkit-line-clamp: 3;-webkit-box-orient: vertical;overflow: hidden;display: -webkit-box;">{{ $article->a_description_seo }}</p>
                <p style="margin: 0px;position: absolute;bottom: 0;">{{ $article->created_at }}</p>
            </div>
        </div>
    @endforeach
    {!! $articles->links() !!}
@endif
