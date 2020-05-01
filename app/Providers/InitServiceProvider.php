<?php

namespace App\Providers;

use App\Models\Index\Information;
use App\Models\Index\Switches;
use Illuminate\Support\ServiceProvider;

class InitServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            //
            $information = Information::query()
                ->select('site_title', 'site_keywords', 'site_description', 'author_name', 'author_intro', 'author_avatar', 'navigation')
                ->first();


            if ($information) {
                $blog = [
                    "name" => $information->site_title,
                    "keywords" => $information->site_keywords,
                    "description" => $information->site_description,
                ];

                $this->app->get('config')->set('vienblog.blog', $blog);

                $author = [ // 博主
                    "name" => $information->author_name,
                    "description" => $information->author_intro,
                    "avatar" => $information->author_avatar,
                ];

                $this->app->get('config')->set('vienblog.author', $author);
                $this->app->get('config')->set('vienblog.header.links', json_decode($information->navigation, true));
            }

            $switches = Switches::query()
                ->select('name', 'status', 'extra')
                ->get()->all();

            if ($switches) {
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

                $baidu_autopush_script = $dict['baidu_autopush']['extra'];
                $baidu_push_domain = array_key_exists('domain', $baidu_autopush_script) ? $baidu_autopush_script['domain'] : "";
                $baidu_push_api = array_key_exists('api', $baidu_autopush_script) ? $baidu_autopush_script['api'] : "";
                $baidu_push = [
                    "domain" => $baidu_push_domain,
                    "api" => $baidu_push_api,
                    "open" => $baidu_push_domain && $baidu_push_api
                ];

                $this->app->get('config')->set('vienblog.sidebar', $sidebar);
                $this->app->get('config')->set('vienblog.ad', $adsense);
                $this->app->get('config')->set('vienblog.counter', $counter);
                $this->app->get('config')->set('vienblog.baidu.auto_push', $dict['baidu_autopush']['status']);
                $this->app->get('config')->set('vienblog.baidu.manual_push', $baidu_push);
//            dump($this->app->get('config')->get('vienblog'));
            }
        } catch (\Exception $e) {

        }

    }
}
