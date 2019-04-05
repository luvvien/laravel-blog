<?php

namespace App\Http\Controllers\Home\Index;

use App\Models\Blog\Article;
use App\Models\Blog\ArticleTag;
use App\Models\Blog\Category;
use App\Models\Blog\Tag;
use App\Models\Index\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    //
    public function index(Request $request)
    {
        $links = Link::all();
        $links = $links ? $links->toArray() : [];
        return view('home.links.friend', ['links' => $links]);
    }

}
