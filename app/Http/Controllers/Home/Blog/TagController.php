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

        $description = $tag.'-';
        $curLen = mb_strlen($description, 'UTF8');

        foreach ($data['data'] as $article) {
            $curLen += mb_strlen($article['title'], 'UTF8');
            if ($curLen > 150) break;
            $description .= $article['title'];
        }

        $data['meta']['title'] = '关于'.$tag.'的文章 - '.config("vienblog.blog.name");
        $data['meta']['description'] = $description;
        $data['meta']['keywords'] = $tag;
//
        return view('home.index', $data);
    }
}
