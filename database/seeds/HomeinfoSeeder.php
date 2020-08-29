<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeinfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('homeinfos')->insert([
            'logo' => 'logo.png',
            'short_detail' => 'Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.',
            'phone' => '+977 123456',
            'email' => 'abcd@gmail.com',
            'clearance' => 'Clearance Up to 30% Off',
            'product_top' => 'Clothing & Apparel',
            'product_bottom' => 'Hot Deals Products',
            'copyrights' => 'Copyright © 2020 somethings Store. All Rights Reserved.',
            'address' => '70 Washington Square South New York, NY 10012, United States'
        ]);
    }
}
