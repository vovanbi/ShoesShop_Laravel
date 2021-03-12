@if(isset($articleHot))
    @foreach($articleHot as $arHot)
        <div class="article_hot_item">
            <div class="article_img">
                <a href="{{ route('get.detail.article',[$arHot->a_slug,$arHot->id]) }}">
                    <img src="{{ asset(pare_url_file($arHot->a_avatar)) }}" style="max-height: 200px;width: 300px" alt="">
                </a>
            </div>
            <div class="article_info">
                <a href="{{ route('get.detail.article',[$arHot->a_slug,$arHot->id]) }}"><h3 style="font-size: 14px;margin-top: 10px;margin-bottom: 10px;">{{ $arHot->a_name }}</h3></a>

            </div>
        </div>
    @endforeach
@endif
