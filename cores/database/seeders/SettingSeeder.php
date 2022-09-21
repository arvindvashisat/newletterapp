<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'site_name' => "My App",
                'site_email' => "siteadmin@gmail.com",
                'email_host' => "smtp",
                'port' => "465",
                'email' => "arvindsmtp@gmail.com",
                'password' => "admin@121",
                'email_template' => "<html><body><p>Hi {name}</p><br /> <p> New post on site {sitename} please check</p></body></html>"
            ]
        
        ]);
    }
}
