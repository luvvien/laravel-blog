<?php

namespace App\Http\Controllers\Admin\Index;

use App\Models\Blog\Article;
use App\Models\Blog\ArticleTag;
use App\Models\Blog\Category;
use App\Models\Blog\Tag;
use App\Models\Index\Information;
use App\Models\Index\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InfoController extends Controller
{
    //
    public function edit(Request $request)
    {
        $information = Information::query()
            ->select('id', 'site_title', 'site_keywords', 'site_description', 'author_name', 'author_intro', 'author_avatar', 'navigation')
            ->first()->toArray();
        return view('admin.info.edit', ['information' => $information]);
    }

    public function update(Request $request)
    {
        $input = $request->input();
        $this->validate($request, [
            'site_title' => 'required|max:30',
            'site_keywords' => 'required|max:50',
            'site_description' => 'required|max:150',
            'author_name' => 'required|max:20',
            'author_intro' => 'required|max:50',
            'author_avatar' => 'required|max:255'
        ]);

//        $data = ['email' => $input['email'], 'name' => $input['name'],];

//        $information = Information::query()->find($input['id']);
        $information = Information::query()->first();

        $information->site_title = $input['site_title'];
        $information->site_keywords = $input['site_keywords'];
        $information->site_description = $input['site_description'];
        $information->author_name = $input['author_name'];
        $information->author_intro = $input['author_intro'];
        $information->author_avatar = $input['author_avatar'];

        $navigation = [];
        for ($i = 0; $i < 9; $i++) {
            $title = $input['navigation-title-'.strval($i)];
            $url = $input['navigation-url-'.strval($i)];
            if ($title && $url) $navigation[] = ["title" => $title, "url" => $url];
        }

        $information->navigation = json_encode($navigation, JSON_UNESCAPED_UNICODE);

        $information->save();

        return view('admin.info.edit', ['information' => $information->toArray()])->with(['message' => 'success']);
    }
}
