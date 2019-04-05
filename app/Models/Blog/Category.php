<?php

namespace App\Models\Blog;

use App\Models\Base\BaseModel;

class Category extends BaseModel
{
    //
    protected $table = 'blog_categories';
    protected $fillable = ['cate_name'];
    public $timestamps = false;
}
