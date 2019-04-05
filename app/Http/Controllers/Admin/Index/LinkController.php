<?php

namespace App\Http\Controllers\Admin\Index;

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
        $links = Link::query()
            ->select('id', 'title', 'follow', 'created_at')
            ->orderByDesc('id')
            ->paginate()->toArray();
        return view('admin.links.friend.index', $links);
    }

    public function new()
    {
        return view('admin.links.friend.new');
    }

    public function store(Request $request)
    {
        $input = $request->input();
        $this->validate($request, [
            'title' => 'required|max:150',
            'description' => 'required|max:150',
            'url' => 'required|max:50',
            'follow' => 'required',
        ]);

        $link = new Link();
        $res = $link->checkStore($input);

        if ($res) {
            return redirect()->route('admin.links.friend.list');
        }

        return redirect()->route('admin.links.friend.new')->withInput();

    }

    public function edit($id)
    {
        $link = Link::query()->find($id);
        if (!$link) {
            abort(404);
        }
        return view('admin.links.friend.edit', ['link' => $link]);
    }

    public function update(Request $request)
    {
        $input = $request->input();
        $this->validate($request, [
            'title' => 'required|max:150',
            'description' => 'required|max:150',
            'url' => 'required|max:50',
            'follow' => 'required',
        ]);

        $link = new Link();
        $res = $link->checkUpdate($input['id'], $input);

        if ($res) {
            return redirect()->route('admin.links.friend.list');
        }

        return redirect()->route('admin.links.friend.edit', $input['id'])->withInput();
    }

    public function delete(Request $request)
    {
        $input = $request->input();
        $this->validate($request, [
            'id' => 'required',
        ]);
        Link::destroy($input['id']);
        return back();
    }

}
