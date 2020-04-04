<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('information')->insert([
            'site_title'  => 'Vien Blog',
            'site_keywords' => 'Laravel,Markdown,免费,开源,博客,Blog',
            'site_description' => '免费开源博客、基于Laravel5.8、支持Markdown、支持图片拖拽上传',
            'author_name' => 'Vien',
            'author_intro' => '一名有职业素养的铲屎官，欢迎云撸猫',
            'author_avatar' => '/images/avatars/lbxx-14.jpeg',
            'navigation' => json_encode([
                [
                    "title" => "首页",
                    "url" => "https://vienblog.com"
                ],
                [
                    "title" => "关于作者",
                    "url" => "https://vienblog.com"
                ],
                [
                    "title" => "打赏作者",
                    "url" => "https://viencoding.com/pay"
                ],
                [
                    "title" => "建站教程",
                    "url" => "https://vienblog.com"
                ],
                [
                    "title" => "科学上网",
                    "url" => "https://viencoding.com/article/122"
                ],
                [
                    "title" => "网站导航",
                    "url" => "https://vienblog.com"
                ],
                [
                    "title" => "机器学习",
                    "url" => "https://vienblog.com/category/机器学习"
                ],
                [
                    "title" => "Laravel教程",
                    "url" => "https://vienblog.com"
                ],
                [
                    "title" => "Python教程",
                    "url" => "https://vienblog.com"
                ],
                [
                    "title" => "Git教程",
                    "url" => "https://vienblog.com"
                ],
                [
                    "title" => "Docker教程",
                    "url" => "https://vienblog.com"
                ],
                [
                    "title" => "友情链接",
                    "url" => "https://vienblog.com"
                ]
            ], JSON_UNESCAPED_UNICODE),
            'created_at' => 1553745930,
            'updated_at' => 1553745930,
        ]);

    }
}
