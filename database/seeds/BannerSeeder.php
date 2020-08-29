<?php

use App\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banner = [
            ['name' => 'Top-Left (277 x 260)','sub_title' => 'Weekend Sale', 'title' => 'Lighting <br>& Accessories <br><span>25% off</span>', 'button_name' => 'Shop Now','image' => '1594988564.jpg'],
            ['name' => 'Top-Middle (576 x 260)','sub_title' => 'Smart Offer', 'title' => 'Clothes Trending <br>Spring Collection 2019 <br><span>from NPR 1,299</span>', 'button_name' => 'Shop Now','image' => '1594988277.jpg'],
            ['name' => 'Top-Right (277 x 260)','sub_title' => 'Amazing Value', 'title' => 'Anniversary <br>Special <br><span>15% off</span>', 'button_name' => 'Discover Now','image' => '1594971025.jpg'],
            ['name' => 'Bottom-Left (575 x 260)','sub_title' => 'Spring Sale is Coming', 'title' => 'All Smart Watches <br>Discount <br><span class="text-primary">15% off</span>', 'button_name' => 'Discover Now','image' => '1594984948.jpg'],
            ['name' => 'Bottom-Right (575 x 260)','sub_title' => 'Weekend Sale', 'title' => 'Headphones Trending <br>JBL Harman <br><span>from NPR 1,200</span>', 'button_name' => 'Discover Now','image' => '1594985031.png'],
        ];
        Banner::insert($banner);
    }
}
