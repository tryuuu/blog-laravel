<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        //=は代入演算子
        //キーと値を関連付けるために使用、キーは articlesで値は$articlesに代入されたArticle::all();の結果
        //こう書くことで複数渡したい場合もいける
        //'articles'という変数名でbladeに渡している
        return view('articles.index', ['articles' => $articles]);

    }

    public function create()
    {
        $articles = new Article();
        return view('articles.create',['articles'=>$articles]);
    }
    //フォームからのPOSTリクエストを受け取る
    public function store(Request $request)
    {
        $article = new Article();
        //create.bladeのPOSTリクエストの処理
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();
        //web.phpで指定した名前にリダイレクト
        return redirect(route('articles.index'));
    }
    //
    public function show(Article $article)
    {
        //$articleはArticleのインスタンス
        //変数名が'article'としてshow.bladeに渡される
        //laravelがURL内のIDを使用しテーブルからそれに対応するArticleモデルを検索
        //->そのインスタンスを show メソッドに渡す
        return view('articles.show', ['article'=>$article]);
    }

    public function edit(Article $article)
    {
        return view('articles.edit',['article'=>$article]);
    }

    public function update(Request $request, Article $article)
    {
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();
        return redirect(route('articles.show', ['article'=>$article]));
    }

    public function delete(Article $article)
    {
        $article->delete();
        return redirect(route('articles.index'));
    }
}
