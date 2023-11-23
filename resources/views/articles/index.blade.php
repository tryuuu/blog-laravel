<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/main.css">
</head>
<body>
    <header>
        <div class="site-title">ミニブログ</div>
        <a href="{{ route('register') }}" class="register-link">会員登録</a>
        <form action="{{ route('login') }}" method="get" class="login-link">
            @csrf
            <button type="submit" class="login-button">ログイン</button>
        </form>
        <form action="{{ route('logout') }}" method="POST" class="logout-link">
            @csrf
            <button type="submit" class="logout-button">ログアウト</button>
        </form>
        @if(Auth::check())
            <div class="login-info">
                {{ Auth::user()->name }}でログインしています。
            </div>
        @endif
    </header>
    <main class="container">
        <!--web.phpで定めた名前へルーティングを変更-->
    <p><a href="{{ route('articles.create') }}">記事を書く</a></p>
        @foreach ($articles as $article)
        <article class="article-item">
            <div class="article-title">
                <!--$article は、個別の記事の情報をもったArticleインスタンス-->
                <!--Laravelはこれを解析して中から idプロパティを取り出し、その値をURLに埋め込む->web.phpへ-->
            <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
            </div>
            <div class="article-info">{{ $article->created_at }}</div>
        </article>
        @endforeach
    </main>
    <footer>
        &copy; Laravel8 入門〜開発実践まで
    </footer>
</body>
</html>