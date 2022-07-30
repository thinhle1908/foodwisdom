<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'user_id'=>2,
            'name'=>'Duc Thinh',
            'address'=>'Quan 1,Thanh Pho Ho Chi Minh',
            'phone'=>'0123456789',
            'email'=>'thinhle@gmail.com',
            'note'=>'Khi toi goi dien ra lay hang',
            'total'=>100000,
            'order_status'=>1,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')

        ]);
        DB::table('orders')->insert([
            'user_id'=>2,
            'name'=>'Duong Van Quang',
            'address'=>'Toa nha Bitexco,Quan 2,Thanh Pho Ho Chi Minh',
            'phone'=>'0123456789',
            'email'=>'quangduong@gmail.com',
            'note'=>'Khi toi goi dien ra lay hang',
            'total'=>50000,
            'order_status'=>1,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')

        ]);
    }
}
