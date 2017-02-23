<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    const selectField = [
        'id',
        'name',
        'created_at',
        'article_id'
    ];
    public function article(){
        $this->belongsTo(Article::class);
    }
}
