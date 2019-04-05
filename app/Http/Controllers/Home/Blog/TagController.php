<?php

namespace App\Http\Controllers\Home\Blog;

use App\Models\Blog\Article;
use App\Models\Blog\ArticleTag;
use App\Models\Blog\Category;
use App\Models\Blog\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TagController extends CommonController
{
    //
    public function show($tag)
    {
        $size = 20;
        $data = Article::with('category:id,cate_name')
            ->select('cate_id', 'slug', 'title', 'read_count', 'created_at', 'is_top', 'description')
            ->leftJoin('blog_article_tags', 'blog_article_tags.article_id', 'blog_articles.id')
            ->leftJoin('blog_tags', 'blog_tags.id', 'blog_article_tags.tag_id')
            ->where('blog_tags.tag_name', '=', $tag)
            ->orderByDesc('is_top')->orderByDesc('created_at');
        $data = $data->paginate($size)->toArray();
        $this->sidebar($data);
//
        return view('home.index', $data);
    }
}
