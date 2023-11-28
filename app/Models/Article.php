<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public function tags()
    {
        //タグとの多対多の関係を定義するメソッドを追加
        return $this->belongsToMany(Tag::class, 'article_tag');
    }
}
