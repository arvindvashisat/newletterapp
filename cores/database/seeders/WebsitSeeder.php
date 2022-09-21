<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class WebsitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('websites')->insert([
            [
                'name' => "Google",
                'url' => "www.google.com"
            ],
            [
                'name' => "SafeYard",
                'url' => "www.safeyards.in"
            ]
        ]);
    }
}
