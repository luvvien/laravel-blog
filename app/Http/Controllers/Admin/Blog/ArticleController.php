<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Models\Blog\Article;
use App\Models\Blog\ArticleTag;
use App\Models\Blog\Category;
use App\Models\Blog\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    //
    public function index(Request $request)
    {
        $size = 15;
        $history = array();
        $data = Article::with('category:id,cate_name')
            ->select('cate_id', 'id', 'is_top', 'slug', 'title', 'created_at', 'read_count');
        if (isset($request->slug) && !empty($request->slug)) {
            $data = $data->where('slug', 'like', '%'.$request->slug.'%');
            $history['slug'] = $request->slug;
        } else {$history['slug'] = '';}
        if (isset($request->title) && !empty($request->title)) {
            $data = $data->where('title', 'like', '%'.$request->title.'%');
            $history['title'] = $request->title;
        } else {$history['title'] = '';}
        if (isset($request->cate_id) && !empty($request->cate_id)) {
            $data = $data->where('cate_id', '=', $request->cate_id);
            $history['cate_id'] = $request->cate_id;
        } else {$history['cate_id'] = '';}
        if (isset($request->is_top) && !empty($request->is_top)) {
            $data = $data->where('is_top', '=', $request->is_top);
            $history['is_top'] = $request->is_top;
        } else {$history['is_top'] = '';}
        $data = $data->orderByDesc('created_at')->paginate($size)->toArray();

        $categories = Category::all()->toArray();
        $data['categories'] = $categories;
        $data['history'] = $history;

        return view('admin.blog.article.index', $data);
    }

    public function new(Request $request)
    {
        $categories = Category::all()->toArray();
        $data = $request->input();
        $data['categories'] = $categories;
        return view('admin.blog.article.new', $data);
    }

    public function store(Request $request)
    {
        $input = $request->input();
        $this->validate($request, [
            'title' => 'required|max:150',
            'slug' => 'required|max:255|unique:blog_articles',
            'description' => 'required|max:150',
            'keywords' => 'required|max:50',
            'markdown' => 'required',
            'tags' => 'required|max:100',
        ]);
        $input['cate_id'] = isset($input['cate_id']) ? $input['cate_id'] : false;

        if(!$input['new_category'] and !$input['cate_id']) {
            return redirect()->route('admin.blog.article.new')->withInput()->withErrors([
                'category' => 'category or new category is required.'
            ]);
        }

        if ($input['new_category']) {
            $category = Category::firstOrCreate(['cate_name' => $input['new_category']]);
            $input['cate_id'] = $category->id;
        }

        $tags = explode(",", $input['tags']);
        $tagIds = array();
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['tag_name' => trim($tagName)]);
            $tagIds[] = $tag->id;
        }

        $input['user_id'] = Auth::guard('admin')->id();

        $article = new Article();
        $res = $article->checkStore($input);

        if ($res) {
            foreach ($tagIds as $tagId) {
                ArticleTag::firstOrCreate(['article_id' => $article->id, 'tag_id' => $tagId]);
            }
            return redirect()->route('admin.blog.article.list');
        }

        return redirect()->route('admin.blog.article.new')->withInput();
    }

    public function edit($id)
    {
        $article = Article::find($id);
        if (!$article) {
            abort(404);
        }
        $data['article'] = $article->toArray();

        $tagNames = ArticleTag::select('blog_tags.tag_name')->where('article_id', '=', $id)
            ->leftJoin('blog_tags', 'blog_article_tags.tag_id', 'blog_tags.id')->get();

        $data['article']['tags'] = '';
        foreach ($tagNames as $tagName) {
            if (!$data['article']['tags']) {
                $data['article']['tags'] = $tagName->tag_name;
            } else {
                $data['article']['tags'] = $data['article']['tags'] . ',' . $tagName->tag_name;
            }
        }

        $categories = Category::all()->toArray();
        $data['categories'] = $categories;

        return view('admin.blog.article.edit', $data);
    }

    public function update(Request $request)
    {
        $input = $request->input();
        $this->validate($request, [
            'id' => 'required',
            'title' => 'required|max:100',
            'slug' => 'required|max:255',
            'description' => 'required|max:150',
            'keywords' => 'required|max:50',
            'markdown' => 'required',
            'tags' => 'required|max:100',
        ]);

        $article = Article::select('id', 'slug')->where('slug', '=', $input['slug'])->first();
        if(isset($article->id) and $article->id != $input['id']) {
            return redirect()->route('admin.blog.article.edit', $input['id'])->withInput()->withErrors([
                "slug" => "slug duplicate."
            ]);
        }

        $input['cate_id'] = isset($input['cate_id']) ? $input['cate_id'] : false;

        if(!$input['new_category'] and !$input['cate_id']) {
            return redirect()->route('admin.blog.article.edit', $input['id'])->withInput()->withErrors([
                'category' => 'category or new category is required.'
            ]);
        }

        if ($input['new_category']) {
            $category = Category::firstOrCreate(['cate_name' => $input['new_category']]);
            $input['cate_id'] = $category->id;
        }

        $tags = explode(",", $input['tags']);
        $tagIds = array();
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['tag_name' => trim($tagName)]);
            $tagIds[] = $tag->id;
        }

        $input['user_id'] = Auth::guard('admin')->id();

        $article = new Article();
        $res = $article->checkUpdate($input['id'], $input);

        if ($res) {
            foreach ($tagIds as $tagId) {
                ArticleTag::firstOrCreate(['article_id' => $input['id'], 'tag_id' => $tagId]);
            }
            return redirect()->route('admin.blog.article.list');
        }

        return redirect()->route('admin.blog.article.edit', $input['id'])->withInput();
    }

    public function delete(Request $request)
    {
        $input = $request->input();
        $this->validate($request, [
            'id' => 'required',
        ]);
        Article::destroy($input['id']);
        return back();
    }

    public function top(Request $request)
    {
        $input = $request->input();
        $this->validate($request, [
            'id' => 'required',
            'is_top' => 'required',
        ]);
        Article::where('id', '=', $input['id'])->update(['is_top' => $input['is_top']]);
        return back();
    }
}
