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

        $data['meta']['title'] = '友情链接与站点导航 - '.config("vienblog.blog.name");
        $data['meta']['description'] = config("vienblog.blog.name").'站点导航与友情链接-'.'交换友链或者添加站点导航请联系站长';
        $data['meta']['keywords'] = '友情链接,友链,站点导航,申请友链,friend link';

        return view('home.links.friend', ['links' => $links]);
    }

}
