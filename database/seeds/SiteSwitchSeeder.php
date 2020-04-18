<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSwitchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('switch')->insert([
            'name' => 'adsense',
            'status' => 0,
            'extra' => '{"script": ""}',
            'created_at' => 1553745930,
            'updated_at' => 1553745930,
        ]);
        DB::table('switch')->insert([
            'name' => "counter",
            'status' => 0,
            'extra' => '{"script": ""}',
            'created_at' => 1553745930,
            'updated_at' => 1553745930,
        ]);
        DB::table('switch')->insert([
            'name' => "baidu_autopush",
            'status' => 0,
            'extra' => '',
            'created_at' => 1553745930,
            'updated_at' => 1553745930,
        ]);
        DB::table('switch')->insert([
            'name' => "motto",
            'status' => 1,
            'extra' => json_encode(
                [
                    "title" => "联系作者",
                    "content" => "微信: luvvien 添加注明: vienblog.com"
                ], JSON_UNESCAPED_UNICODE),
            'created_at' => 1553745930,
            'updated_at' => 1553745930,
        ]);
        DB::table('switch')->insert([
            'name' => "tag",
            'status' => 1,
            'extra' => json_encode(
                [
                    "title" => "标签",
                    "count" => 30
                ], JSON_UNESCAPED_UNICODE),
            'created_at' => 1553745930,
            'updated_at' => 1553745930,
        ]);
        DB::table('switch')->insert([
            'name' => "category",
            'status' => 1,
            'extra' => json_encode(
                [
                    "title" => "分类",
                    "count" => 20
                ], JSON_UNESCAPED_UNICODE),
            'created_at' => 1553745930,
            'updated_at' => 1553745930,
        ]);
        DB::table('switch')->insert([
            'name' => "hot",
            'status' => 1,
            'extra' => json_encode(
                [
                    "title" => "热门文章",
                    "count" => 8
                ], JSON_UNESCAPED_UNICODE),
            'created_at' => 1553745930,
            'updated_at' => 1553745930,
        ]);
        DB::table('switch')->insert([
            'name' => "latest",
            'status' => 1,
            'extra' => json_encode(
                [
                    "title" => "刚刚发布了",
                    "count" => 8
                ], JSON_UNESCAPED_UNICODE),
            'created_at' => 1553745930,
            'updated_at' => 1553745930,
        ]);
        DB::table('switch')->insert([
            'name' => "popular",
            'status' => 1,
            'extra' => json_encode(
                [
                    "title" => "最近有人在看",
                    "count" => 8
                ], JSON_UNESCAPED_UNICODE),
            'created_at' => 1553745930,
            'updated_at' => 1553745930,
        ]);
        DB::table('switch')->insert([
            'name' => "carousel",
            'status' => 1,
            'extra' => json_encode([ // 设置滚动的Banner 请让图的长宽比都相同 否则切换时高度会变化
                [
                    "image" => "/images/banners/vultr_affiliate_560x260.png", // 图片路径
                    "url" => "https://www.vultr.com/?ref=8372175-6G", // 点击后的跳转链接
                    "description" => "优质国外服务器供应商Vultr限时注册送100刀", // Banner描述 用于img标签的alt属性
                ],
                [
                    "image" => "/images/banners/ali_affiliate_560x260.png", // 图片路径
                    "url" => "https://promotion.aliyun.com/ntms/yunparter/invite.html?userCode=clx8dxhx", // 点击后的跳转链接
                    "description" => "阿里云高性能服务器低至2折", // Banner描述 用于img标签的alt属性
                ],
                [
                    "image" => "/images/banners/tencent_affiliate_560x260.png", // 图片路径
                    "url" => "https://cloud.tencent.com/redirect.php?redirect=1025&cps_key=2d48606c208631c31d73aadcb8412bab&from=console", // 点击后的跳转链接
                    "description" => "推广者专属福利，新客户无门槛领取总价值高达2860元代金券，每种代金券限量500张，先到先得。", // Banner描述 用于img标签的alt属性
                ],
            ], JSON_UNESCAPED_UNICODE),
            'created_at' => 1553745930,
            'updated_at' => 1553745930,
        ]);
    }
}
