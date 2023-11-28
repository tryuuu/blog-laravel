<!-- 検索フォーム -->
<form action="{{ route('tag.search.submit') }}" method="POST">
    @csrf
    <input type="text" name="tag" placeholder="タグで検索">
    <button type="submit">検索</button>
</form>
<a href="{{ route('articles.index') }}">ホームに戻る</a>