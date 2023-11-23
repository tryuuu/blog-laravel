<form action="{{ route('articles.update', $article) }}" method="post">
@csrf            
<dl class="form-list">
                <dt>タイトル</dt>
                <dd><input type="text" name="title"></dd>
                <dt>本文</dt>
                <dd><textarea name="body" rows="5"></textarea></dd>
            </dl>
    <button type="submit">更新する</button>
    <a href="{{ route('articles.show', $article) }}">キャンセル</a>
</form>