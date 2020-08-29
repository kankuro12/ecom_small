<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            'sub_title' => 'Trade-In Offer',
            'title' => 'MacBook Air <br> Latest Model',
            'price_section' => '<sup class="font-weight-light">from</sup> <span class="text-primary">Rs.99,000</span>',
            'button_name' => 'Shop Now',
            'image' => '1595070819.png',
        ]);
    }
}
