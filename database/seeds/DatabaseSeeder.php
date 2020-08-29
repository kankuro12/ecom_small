<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SocialMediaSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(TermsSeeder::class);
        $this->call(HomeinfoSeeder::class);
        $this->call(PopupSeeder::class);
    }
}
