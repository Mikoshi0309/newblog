<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    protected $table = 'article_tag';
    protected $primaryKey = 'article_id,tag_id';
    protected $fillable = ['article_id,tag_id'];
    public $timestamps = false;
}
