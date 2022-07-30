<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role_name'=>"admin",
        ]);
        DB::table('roles')->insert([
            'role_name'=>"warehouse_staff",
        ]);
        DB::table('roles')->insert([
            'role_name'=>"user",
        ]);
    }
}
