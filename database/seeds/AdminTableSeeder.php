<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('blog_admins')->insert([
            'name'  => 'admin',
            'email' => 'vien@byteinf.com',
            'password' => bcrypt('vienblog'),
            'created_at' => 1553745930,
            'updated_at' => 1553745930,
        ]);
    }
}