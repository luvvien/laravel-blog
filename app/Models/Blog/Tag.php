<?php

namespace App\Models\Blog;

use App\Models\Base\BaseModel;

class Tag extends BaseModel
{
    //
    protected $table = 'blog_tags';
    protected $fillable = ['tag_name'];
    public $timestamps = false;
}
