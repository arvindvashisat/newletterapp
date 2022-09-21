<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'user_id' => 1,
                'web_id' => 1,
                'post_heading' => "This is test post",
                'description' => "Hello this is my test post for all"
            ],
            [
                'user_id' => 1,
                'web_id' => 2,
                'post_heading' => "This is test post 2",
                'description' => "Hello this is my test post for all 2"
            ]
        ]);
    }
}
