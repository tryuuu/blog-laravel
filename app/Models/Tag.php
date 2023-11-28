<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function articles()
    {
        //TagモデルとArticleモデルがarticle_tagという中間テーブルを介して関連付けられている
        return $this->belongsToMany(Article::class, 'article_tag');
    }
}
