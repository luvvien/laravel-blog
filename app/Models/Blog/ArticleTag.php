<?php

namespace App\Models\Blog;

use App\Models\Base\BaseModel;

class ArticleTag extends BaseModel
{
    //
    protected $table = 'blog_article_tags';
    protected $fillable = ['article_id', 'tag_id'];
    public $timestamps = false;
}
