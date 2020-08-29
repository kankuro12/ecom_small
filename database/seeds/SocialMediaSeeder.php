<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('socials')->delete();
        DB::table('socials')->insert([
            'facebook' => 'http://facebook.com',
            'twiter' => 'http://twitter.com',
            'instagram' => 'http://instagram.com',
            'youtube' => 'http://youtube.com'
        ]);
    }
}
