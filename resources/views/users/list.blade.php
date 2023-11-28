<!DOCTYPE html>
<html lang="ja">
<body>
    <header>
        <div class="site-title">メンバー一覧</div>
    </header>
    <main class="container">
    @foreach ($users as $user)
    <div class="user-item">
        <div class="user-name">
            名前: {{ $user->name }}
        </div>
        <div class="user-email">メール: {{ $user->email }}</div>
    </div>
    @endforeach
    <a href="{{ route('articles.index') }}">戻る</a>
</body>
