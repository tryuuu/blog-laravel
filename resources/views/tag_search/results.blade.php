<h2>'{{ $tagName }}'の検索結果</h2>

@foreach ($articles as $article)
    <article class="article-item">
        <h3><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></h3>
        <p>by {{ $article->author }}</p>
        <!-- その他の記事の詳細 -->
    </article>
@endforeach
<a href="{{ route('articles.index') }}">ホームに戻る</a>