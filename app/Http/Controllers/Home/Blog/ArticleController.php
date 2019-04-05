<?php

namespace App\Http\Controllers\Home\Blog;

use App\Models\Blog\Article;
use App\Models\Blog\ArticleTag;
use App\Models\Blog\Category;
use App\Models\Blog\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticleController extends CommonController
{
    //
    public function index(Request $request)
    {
        $size = 20;
        $data = Article::with('category:id,cate_name')
            ->select( 'cate_id', 'slug', 'title', 'read_count', 'created_at', 'is_top', 'description')
            ->orderByDesc('is_top')->orderByDesc('created_at');


        if (isset($request->id)) {
            $data = $data->where('id', '=', $request->id);
        }
        if (isset($request->name)) {
            $data = $data->where('name', 'like', '%' . $request->name . '%');
        }
        if (isset($request->start_at) && isset($request->end_at)) {
            $data = $data->whereBetween('created_at', array($request->start_at, $request->end_at));
        }
        $data = $data->paginate($size)->toArray();
        $this->sidebar($data);

        return view('home.index', $data);
    }

    public function show($slug)
    {
        $article = Article::with('category:id,cate_name')
            ->select( 'id', 'cate_id', 'slug', 'title', 'read_count', 'created_at', 'is_top', 'description', 'markdown', 'keywords')
            ->where('slug', '=', $slug)->first();


        if (!$article) {
            return view('errors.404');
        }

        $article->increment("read_count");

        $tags = ArticleTag::query()
            ->select('blog_tags.tag_name')
            ->where('article_id', '=', $article->id)
            ->leftJoin('blog_tags', 'blog_article_tags.tag_id', 'blog_tags.id')
            ->get();

        $article = $article->toArray();
        $article['markdown'] = markdown($article['markdown']);

        $data['article'] = $article;
        $data['article']['tags'] = $tags->toArray();
        $data['guess_you_like_articles'] = $this->guessYouLikeArticles($article['cate_id'], $slug);

        $this->sidebar($data);

        return view('home.blog.article.index', $data);
    }

    /* guess you like*/
    protected function guessYouLikeArticles($cate_id, $slug)
    {
        $articles = Article::query()
            ->select('slug', 'title', 'read_count', 'description')
            ->where('cate_id', '=', $cate_id)
            ->where('slug', '!=', $slug)
            ->inRandomOrder()
            ->limit(8)->get();

        return $this->parseToArray($articles);
    }

}
