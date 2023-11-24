<article class="article-detail">
    <h1 class="article-title">{{ $article->title }}</h1>
    <div class="article-info">{{ $article->created_at }}</div>
    <div class="article-body">{!! nl2br(e($article->body)) !!}</div>
    <div class="article-control">
    <a href="{{ route('articles.index', $article) }}">戻る</a>
    @if(Auth::check())
    @if(Auth::user()->id==$article->user_id)
        <a href="{{ route('articles.edit', $article) }}">編集</a>
        <form onsubmit="return confirm('本当に削除しますか？')" action="{{ route('article.delete', $article) }}" method="post">
            @csrf 
            @method('DELETE')
            <button type="submit">削除</button>
        </form>
        @endif
        @endif
    </div>
</article>