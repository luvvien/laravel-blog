<?php

namespace App\Http\Controllers\Admin\Index;

use App\Models\Blog\Article;
use App\Models\Blog\ArticleTag;
use App\Models\Blog\Category;
use App\Models\Blog\Tag;
use App\Models\Index\Information;
use App\Models\Index\Link;
use App\Models\Index\Switches;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SwitchController extends Controller
{
    //
    public function edit(Request $request)
    {
        $switches = self::switches();
        return view('admin.switch.edit', ['switches' => $switches]);
    }

    public function update(Request $request)
    {
        $input = $request->input();
//        $this->validate($request, [
//            "carousel-switch" => "required",
//            "carousel-image-1" => "required",
//            "carousel-url-1" => "required",
//            "carousel-description-1" => "required",
//            "carousel-image-2" => "required",
//            "carousel-url-2" => "required",
//            "carousel-description-2" => "required",
//            "carousel-image-3" => "required",
//            "carousel-url-3" => "required",
//            "carousel-description-3" => "required",
//            "motto-switch" => "required",
//            "motto-title" => "required",
//            "motto-content" => "required",
//            "tag-switch" => "required",
//            "tag-title" => "required",
//            "tag-count" => "required",
//            "category-switch" => "required",
//            "category-title" => "required",
//            "category-count" => "required",
//            "hot-switch" => "required",
//            "hot-title" => "required",
//            "hot-count" => "required",
//            "latest-switch" => "required",
//            "latest-title" => "required",
//            "latest-count" => "required",
//            "popular-switch" => "required",
//            "popular-title" => "required",
//            "popular-count" => "required",
//            "adsense-switch" => "required",
//            "adsense-script" => "required",
//            "counter-switch" => "required",
//            "counter-script" => "required"
//        ]);

        $baidu_autopushswitch = isset($input["baidu_autopush-switch"]) ? 1 : 0;
        $baidupush_domain = $input["baidupush-domain"];
        $baidupush_api = $input["baidupush-api"];
        $carouselswitch = isset($input["carousel-switch"]) ? 1 : 0;
        $carouselimage1 = $input["carousel-image-1"];
        $carouselurl1 = $input["carousel-url-1"];
        $carouseldescription1 = $input["carousel-description-1"];
        $carouselimage2 = $input["carousel-image-2"];
        $carouselurl2 = $input["carousel-url-2"];
        $carouseldescription2 = $input["carousel-description-2"];
        $carouselimage3 = $input["carousel-image-3"];
        $carouselurl3 = $input["carousel-url-3"];
        $carouseldescription3 = $input["carousel-description-3"];
        $mottoswitch = isset($input["motto-switch"]) ? 1 : 0;
        $mottotitle = $input["motto-title"];
        $mottocontent = $input["motto-content"];
        $tagswitch = isset($input["tag-switch"]) ? 1 : 0;
        $tagtitle = $input["tag-title"];
        $tagcount = $input["tag-count"];
        $categoryswitch = isset($input["category-switch"]) ? 1 : 0;
        $categorytitle = $input["category-title"];
        $categorycount = $input["category-count"];
        $hotswitch = isset($input["hot-switch"]) ? 1 : 0;
        $hottitle = $input["hot-title"];
        $hotcount = $input["hot-count"];
        $latestswitch = isset($input["latest-switch"]) ? 1 : 0;
        $latesttitle = $input["latest-title"];
        $latestcount = $input["latest-count"];
        $popularswitch = isset($input["popular-switch"]) ? 1 : 0;
        $populartitle = $input["popular-title"];
        $popularcount = $input["popular-count"];
        $adsenseswitch = isset($input["adsense-switch"]) ? 1 : 0;
        $adsensescript = isset($input["adsense-script"]) ? $input["adsense-script"] : "";
        $counterswitch = isset($input["counter-switch"]) ? 1 : 0;
        $counterscript = isset($input["counter-script"]) ? $input["counter-script"] : "";

        $adsense = Switches::query()->where("name", "=", "adsense")->first();

        $adsense->status = $adsenseswitch;
        $adsense->extra = json_encode(["script" => $adsensescript], JSON_UNESCAPED_UNICODE);
        $adsense->save();

        $counter = Switches::query()->where("name", "=", "counter")->first();
        $counter->status = $counterswitch;
        $counter->extra = json_encode(["script" => $counterscript], JSON_UNESCAPED_UNICODE);
        $counter->save();

        $motto = Switches::query()->where("name", "=", "motto")->first();
        $motto->status = $mottoswitch;
        $motto->extra = json_encode(["title" => $mottotitle, "content" => $mottocontent], JSON_UNESCAPED_UNICODE);
        $motto->save();

        $tag = Switches::query()->where("name", "=", "tag")->first();
        $tag->status = $tagswitch;
        $tag->extra = json_encode(["title" => $tagtitle, "count" => $tagcount], JSON_UNESCAPED_UNICODE);
        $tag->save();

        $category = Switches::query()->where("name", "=", "category")->first();
        $category->status = $categoryswitch;
        $category->extra = json_encode(["title" => $categorytitle, "count" => $categorycount], JSON_UNESCAPED_UNICODE);
        $category->save();

        $hot = Switches::query()->where("name", "=", "hot")->first();
        $hot->status = $hotswitch;
        $hot->extra = json_encode(["title" => $hottitle, "count" => $hotcount], JSON_UNESCAPED_UNICODE);
        $hot->save();

        $latest = Switches::query()->where("name", "=", "latest")->first();
        $latest->status = $latestswitch;
        $latest->extra = json_encode(["title" => $latesttitle, "count" => $latestcount], JSON_UNESCAPED_UNICODE);
        $latest->save();

        $popular = Switches::query()->where("name", "=", "popular")->first();
        $popular->status = $popularswitch;
        $popular->extra = json_encode(["title" => $populartitle, "count" => $popularcount], JSON_UNESCAPED_UNICODE);
        $popular->save();

        $carousel = Switches::query()->where("name", "=", "carousel")->first();
        $carousel->status = $carouselswitch;
        $carousel->extra = json_encode([
            ["image" => $carouselimage1, "url" => $carouselurl1, "description" => $carouseldescription1],
            ["image" => $carouselimage2, "url" => $carouselurl2, "description" => $carouseldescription2],
            ["image" => $carouselimage3, "url" => $carouselurl3, "description" => $carouseldescription3]
        ], JSON_UNESCAPED_UNICODE);
        $carousel->save();

        $baidu_autopush = Switches::query()->where("name", "=", "baidu_autopush")->first();
        $baidu_autopush->status = $baidu_autopushswitch;
        $baidu_autopush->extra = json_encode(["domain" => $baidupush_domain ? $baidupush_domain : "",
            "api" => $baidupush_api ? $baidupush_api : ""], JSON_UNESCAPED_UNICODE);
        $baidu_autopush->save();

        $switches = self::switches();

        return view('admin.switch.edit', ['switches' => $switches])->with(['message' => 'success']);
    }

    private function switches()
    {
        $switches = Switches::query()
            ->select('id', 'name', 'status', 'extra')
            ->get()->toArray();

        $dict = array();

        foreach ($switches as $switch) {
            $extra = json_decode($switch['extra'], true);
            $dict[$switch['name']] = array('status' => intval($switch['status']) == 1,
                'extra' => is_null($extra) ? [] : $extra);
        }

        $sidebar = [
            "carousel" => [
                "open" => $dict['carousel']['status'], // 是(true)否(false)开启 默认true 开启务必设置banners
                "banners" => $dict['carousel']['extra']
            ],
            "motto" => [ // 座右铭
                "open" => $dict['motto']['status'], // 是(true)否(false)开启 默认true,
                "title" => $dict['motto']['extra']['title'], // 标题
                "content" => $dict['motto']['extra']['content'] // 内容
            ],
            "tag" => [ // 标签
                "open" => $dict['tag']['status'], // 是(true)否(false)开启 默认true,
                "title" => $dict['tag']['extra']['title'], // 标题
                "count" => intval($dict['tag']['extra']['count']), // 展示数量
            ],
            "category" => [ // 分类
                "open" => $dict['category']['status'], // 是(true)否(false)开启 默认true,
                "title" => $dict['category']['extra']['title'], // 标题
                "count" => intval($dict['category']['extra']['count']), // 展示数量
            ],
            "hot" => [ // 最热文章
                "open" => $dict['hot']['status'], // 是(true)否(false)开启 默认true,
                "title" => $dict['hot']['extra']['title'], // 标题
                "count" => intval($dict['hot']['extra']['count']), // 展示数量
            ],
            "latest" => [ // 最新文章
                "open" => $dict['latest']['status'], // 是(true)否(false)开启 默认true,
                "title" => $dict['latest']['extra']['title'], // 标题
                "count" => intval($dict['latest']['extra']['count']), // 展示数量
            ],
            "popular" => [ // 刚有人看的文章
                "open" => $dict['popular']['status'], // 是(true)否(false)开启 默认true,
                "title" => $dict['popular']['extra']['title'], // 标题
                "count" => intval($dict['popular']['extra']['count']), // 展示数量
            ],
        ];

        $adsense_script = $dict['adsense']['extra'];
        $adsense = [
            "open" => $dict['adsense']['status'], // Google AdSense Auto AD 开关 默认关闭 开启需要在后台中添加 AdSense代码
            "script" => array_key_exists('script', $adsense_script) ? $adsense_script['script'] : ""
        ];
        $counter_script = $dict['counter']['extra'];
        $counter = [
            "open" => $dict['counter']['status'], // 统计工具(例如百度统计、StatCounter等) 开关 默认关闭 开启需要在后台中添加相关代码
            "script" => array_key_exists('script', $counter_script) ? $counter_script['script'] : ""
        ];

        $baidu_autopush = $dict['baidu_autopush']['status'];
        $baidu_push = $dict['baidu_autopush']['extra'] ? $dict['baidu_autopush']['extra'] :
            ["domain" => "", "api" => ""];

        $switches = ['sidebar' => $sidebar, 'adsense' => $adsense, 'counter' => $counter,
            'baidu_autopush' => $baidu_autopush, 'baidu_push' => $baidu_push];

        return $switches;
    }
}
