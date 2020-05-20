<?php

namespace App\Http\Controllers\Admin\Index;

use App\Models\Blog\Article;
use App\Models\Blog\ArticleTag;
use App\Models\Blog\Category;
use App\Models\Blog\Tag;
use App\Models\Index\Information;
use App\Models\Index\Link;
use App\Models\Index\Setting;
use App\Models\Index\Switches;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    //
    public function edit(Request $request)
    {
        $setting = self::setting();
        return view('admin.setting.edit', ['setting' => $setting]);
    }

    public function update(Request $request)
    {
        $input = $request->input();
//
        $watermark_open = isset($input["watermark-open"]);
        $watermark_content = $input["watermark-content"];
        $theme = $input["theme"];

        $setting_arr = [
            "watermark" => [
                "open" => $watermark_open,
                "content" => $watermark_content
            ],
            "theme" => $theme
        ];

        $setting_json = json_encode($setting_arr, JSON_UNESCAPED_UNICODE);

        $setting = Setting::query()->first();
        $setting->json = $setting_json;
        $setting->save();

        return view('admin.setting.edit', ['setting' => $setting_arr])->with(['message' => 'success']);
    }

    private function setting()
    {
        $setting = Setting::query()
            ->select('json')
            ->first();
        $setting = json_decode($setting->json, true);
        return $setting;
    }
}
