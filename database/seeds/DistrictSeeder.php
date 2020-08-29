<?php

use App\District;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->delete();
        $district = [
            ['district' => 'Bhojpur', 'shipping_charge' => 0, 'province_id' => 1],
            ['district' => 'Dhankuta', 'shipping_charge' => 0, 'province_id' => 1],
            ['district' => 'Ilam', 'shipping_charge' => 0, 'province_id' => 1],
            ['district' => 'Jhapa', 'shipping_charge' => 0, 'province_id' => 1],
            ['district' => 'Khotang', 'shipping_charge' => 0, 'province_id' => 1],
            ['district' => 'Morang', 'shipping_charge' => 0, 'province_id' => 1],
            ['district' => 'Okhaldhunga', 'shipping_charge' => 0, 'province_id' => 1],
            ['district' => 'Panchthar', 'shipping_charge' => 0, 'province_id' => 1],
            ['district' => 'Sankhuwasabha', 'shipping_charge' => 0, 'province_id' => 1],
            ['district' => 'Solukhumbu', 'shipping_charge' => 0, 'province_id' => 1],
            ['district' => 'Sunsari', 'shipping_charge' => 0, 'province_id' => 1],
            ['district' => 'Taplejung', 'shipping_charge' => 0, 'province_id' => 1],
            ['district' => 'Terhathum', 'shipping_charge' => 0, 'province_id' => 1],
            ['district' => 'Udayapur', 'shipping_charge' => 0, 'province_id' => 1],

            ['district' => 'Saptari', 'shipping_charge' => 0, 'province_id' => 2],
            ['district' => 'Siraha', 'shipping_charge' => 0, 'province_id' => 2],
            ['district' => 'Dhanusa', 'shipping_charge' => 0, 'province_id' => 2],
            ['district' => 'Mahottari', 'shipping_charge' => 0, 'province_id' => 2],
            ['district' => 'Sarlahi', 'shipping_charge' => 0, 'province_id' => 2],
            ['district' => 'Bara', 'shipping_charge' => 0, 'province_id' => 2],
            ['district' => 'Parsa', 'shipping_charge' => 0, 'province_id' => 2],
            ['district' => 'Rautahat', 'shipping_charge' => 0, 'province_id' => 2],

            ['district' => 'Sindhuli', 'shipping_charge' => 0, 'province_id' => 3],
            ['district' => 'Ramechhap', 'shipping_charge' => 0, 'province_id' => 3],
            ['district' => 'Dolakha', 'shipping_charge' => 0, 'province_id' => 3],
            ['district' => 'Bhaktapur', 'shipping_charge' => 0, 'province_id' => 3],
            ['district' => 'Dhading', 'shipping_charge' => 0, 'province_id' => 3],
            ['district' => 'Kathmandu', 'shipping_charge' => 0, 'province_id' => 3],
            ['district' => 'Kavrepalanchok', 'shipping_charge' => 0, 'province_id' => 3],
            ['district' => 'Lalitpur', 'shipping_charge' => 0, 'province_id' => 3],
            ['district' => 'Nuwakot', 'shipping_charge' => 0, 'province_id' => 3],
            ['district' => 'Rasuwa', 'shipping_charge' => 0, 'province_id' => 3],
            ['district' => 'Sindhupalchok', 'shipping_charge' => 0, 'province_id' => 3],
            ['district' => 'Chitawan', 'shipping_charge' => 0, 'province_id' => 3],
            ['district' => 'Makwanpur', 'shipping_charge' => 0, 'province_id' => 3],

            ['district' => 'Baglung', 'shipping_charge' => 0, 'province_id' => 4],
            ['district' => 'Gorkha', 'shipping_charge' => 0, 'province_id' => 4],
            ['district' => 'Kaski', 'shipping_charge' => 0, 'province_id' => 4],
            ['district' => 'Lamjung', 'shipping_charge' => 0, 'province_id' => 4],
            ['district' => 'Manag', 'shipping_charge' => 0, 'province_id' => 4],
            ['district' => 'Mustang', 'shipping_charge' => 0, 'province_id' => 4],
            ['district' => 'Myagdi', 'shipping_charge' => 0, 'province_id' => 4],
            ['district' => 'Nawalpur', 'shipping_charge' => 0, 'province_id' => 4],
            ['district' => 'Parbat', 'shipping_charge' => 0, 'province_id' => 4],
            ['district' => 'Syangja', 'shipping_charge' => 0, 'province_id' => 4],
            ['district' => 'Tanahun', 'shipping_charge' => 0, 'province_id' => 4],

            ['district' => 'Kapilvastu', 'shipping_charge' => 0, 'province_id' => 5],
            ['district' => 'Parasi', 'shipping_charge' => 0, 'province_id' => 5],
            ['district' => 'Rupandehi', 'shipping_charge' => 0, 'province_id' => 5],
            ['district' => 'Arghakhanchi', 'shipping_charge' => 0, 'province_id' => 5],
            ['district' => 'Gulmi', 'shipping_charge' => 0, 'province_id' => 5],
            ['district' => 'Palpa', 'shipping_charge' => 0, 'province_id' => 5],
            ['district' => 'Dang Deukhuri', 'shipping_charge' => 0, 'province_id' => 5],
            ['district' => 'Pyuthan', 'shipping_charge' => 0, 'province_id' => 5],
            ['district' => 'Rolpa', 'shipping_charge' => 0, 'province_id' => 5],
            ['district' => 'Eastern Rukum', 'shipping_charge' => 0, 'province_id' => 5],
            ['district' => 'Banke', 'shipping_charge' => 0, 'province_id' => 5],
            ['district' => 'Bardiya', 'shipping_charge' => 0, 'province_id' => 5],

            ['district' => 'Western Rukum', 'shipping_charge' => 0, 'province_id' => 6],
            ['district' => 'Salyan', 'shipping_charge' => 0, 'province_id' => 6],
            ['district' => 'Dolpa', 'shipping_charge' => 0, 'province_id' => 6],
            ['district' => 'Humla', 'shipping_charge' => 0, 'province_id' => 6],
            ['district' => 'Jumla', 'shipping_charge' => 0, 'province_id' => 6],
            ['district' => 'Kalikot', 'shipping_charge' => 0, 'province_id' => 6],
            ['district' => 'Mugu', 'shipping_charge' => 0, 'province_id' => 6],
            ['district' => 'Surkhet', 'shipping_charge' => 0, 'province_id' => 6],
            ['district' => 'Dailekh', 'shipping_charge' => 0, 'province_id' => 6],
            ['district' => 'Jajarkot', 'shipping_charge' => 0, 'province_id' => 6],

            ['district' => 'Kailali', 'shipping_charge' => 0, 'province_id' => 7],
            ['district' => 'Achham', 'shipping_charge' => 0, 'province_id' => 7],
            ['district' => 'Doti', 'shipping_charge' => 0, 'province_id' => 7],
            ['district' => 'Bajhang', 'shipping_charge' => 0, 'province_id' => 7],
            ['district' => 'Bajura', 'shipping_charge' => 0, 'province_id' => 7],
            ['district' => 'Kanchanpur', 'shipping_charge' => 0, 'province_id' => 7],
            ['district' => 'Dadeldhura', 'shipping_charge' => 0, 'province_id' => 7],
            ['district' => 'Baitadi', 'shipping_charge' => 0, 'province_id' => 7],
            ['district' => 'Darchula', 'shipping_charge' => 0, 'province_id' => 7],
        ];
        District::insert($district);
    }
}
