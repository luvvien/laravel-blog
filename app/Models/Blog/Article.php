<?php

namespace App\Models\Blog;

use App\Models\Base\BaseModel;

class Article extends BaseModel
{
    //
    protected $table = 'blog_articles';
    protected $fillable = ['slug', 'title', 'keywords', 'description', 'markdown', 'user_id', 'cate_id'];

    //
    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }

    public function checkStore($data)
    {

        $validData = array();
        foreach ($this->fillable as $key) {
            if (isset($data[$key])) {
                $validData[$key] = $data[$key];
            } elseif (!in_array($key, $this->allowEmpty)) {
                return 0;
            }
        }

        return $this->fill($validData)->save();

    }
}
