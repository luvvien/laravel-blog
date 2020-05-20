<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $setting = [
            "watermark" => [
                "open" => false,
                "content" => "VienBlog.com"
            ],
            "theme" => "gray"
        ];
        DB::table('setting')->insert([
            'json' => json_encode($setting, JSON_UNESCAPED_UNICODE),
            'created_at' => 1553745930,
            'updated_at' => 1553745930,
        ]);

    }
}
