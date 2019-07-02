<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FriendLinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('friend_links')->insert([
            'title'  => 'Vien Blog',
            'description' => '免费开源博客、基于Laravel5.8、支持Markdown、支持图片拖拽上传',
            'url' => 'https://vienblog.com',
            'follow' => '1',
            'created_at' => 1553745930,
            'updated_at' => 1553745930,
        ]);
        DB::table('friend_links')->insert([
            'title'  => '小白一键VPN',
            'description' => 'ss/ssr一键搭建教程、outline教程、国外VPS优惠购买、免费ss/ssr账号分享',
            'url' => 'https://viencoding.com',
            'follow' => '1',
            'created_at' => 1553745930,
            'updated_at' => 1553745930,
        ]);
    }
}
