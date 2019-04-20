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

        $description = $category.'-';
        $curLen = mb_strlen($description, 'UTF8');

        foreach ($data['data'] as $article) {
            $curLen += mb_strlen($article['title'], 'UTF8');
            if ($curLen > 150) break;
            $description .= $article['title'];
        }

        $data['meta']['title'] = '关于'.$category.'的文章 - '.config("vienblog.blog.name");
        $data['meta']['description'] = $description;
        $data['meta']['keywords'] = $category;

        return view('home.index', $data);
    }
}
