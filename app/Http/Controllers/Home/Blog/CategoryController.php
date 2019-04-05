<?php

namespace App\Http\Controllers\Home\Blog;

use App\Models\Blog\Article;
use App\Models\Blog\ArticleTag;
use App\Models\Blog\Category;
use App\Models\Blog\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends CommonController
{
    //
    public function show($category)
    {
        $size = 20;
        $data = Article::with('category:id,cate_name')
            ->leftJoin('blog_categories', 'blog_categories.id', 'blog_articles.cate_id')
            ->where('blog_categories.cate_name', '=', $category)
            ->select( 'cate_id', 'slug', 'title', 'read_count', 'created_at', 'is_top', 'description')
            ->orderByDesc('is_top')->orderByDesc('created_at');

        $data = $data->paginate($size)->toArray();
        $this->sidebar($data);

        return view('home.index', $data);
    }
}
