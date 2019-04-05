<?php

namespace App\Http\Controllers\Home\Blog;

use App\Models\Blog\Article;
use App\Models\Blog\ArticleTag;
use App\Models\Blog\Category;
use App\Models\Blog\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommonController extends Controller
{
    /* sidebar */

    public function sidebar(&$data)
    {
        $data['sidebar_tags'] = $this->sidebarTags();
        $data['sidebar_categories'] = $this->sidebarCategories();
        $data['sidebar_hots'] = $this->hotArticles();
        $data['sidebar_latest'] = $this->latestArticles();
        $data['sidebar_populars'] = $this->popularArticles();
    }

    protected function sidebarTags()
    {
        $tags = Tag::select('tag_name')
            ->inRandomOrder()
//            ->orderBy('tag_name')
            ->limit(config('vienblog.sidebar.tag.count'))
            ->get();

        return $this->parseToArray($tags);
    }

    protected function sidebarCategories()
    {
        $categories = Category::select('cate_name')
//            ->orderBy('cate_name')
            ->inRandomOrder()
            ->limit(config('vienblog.sidebar.category.count'))
            ->get();

        return $this->parseToArray($categories);
    }

    protected function hotArticles()
    {
        $articles = Article::select('slug', 'title', 'read_count')
            ->orderBy('read_count', 'desc')
            ->limit(config('vienblog.sidebar.hot.count'))
            ->get();

        return $this->parseToArray($articles);
    }

    protected function latestArticles()
    {
        $articles = Article::select('slug', 'title', 'read_count')
            ->orderBy('created_at', 'desc')
            ->limit(config('vienblog.sidebar.latest.count'))
            ->get();

        return $this->parseToArray($articles);
    }

    protected function popularArticles()
    {
        $articles = Article::select('slug', 'title', 'read_count')
            ->orderBy('updated_at', 'desc')
            ->limit(config('vienblog.sidebar.popular.count'))
            ->get();

        return $this->parseToArray($articles);
    }

}
