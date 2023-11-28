<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Article;

class TagSearchController extends Controller
{
    public function index()
    {
        return view('tag_search.index');
    }
    public function search(Request $request)
    {
        //フォーム取得(タグが記載)
        $tagName=$request->input('tag');
        //tagsテーブルでユーザーが入力したものと同じタグを検索
        $tag=Tag::where('name',$tagName)->first();
        $articles=[];
        //$tagがNULLでない時
        if($tag){
            //多対多のリレーションを使用して articles テーブル内の関連する記事を取得
            //Tagモデルのarticlesメソッドを使用
            //特定のTagインスタンス（この場合は$tagに関連付けられているArticleインスタンス(記事))にアクセスできる
            $articles=$tag->articles()->get();
        }
        return view('tag_search.results',['articles'=>$articles,'tagName'=>$tagName]);
    }

}
