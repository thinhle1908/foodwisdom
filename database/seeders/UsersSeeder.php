<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>"Thinh Le",
            'email'=>"thinhle@gmail.com",
            'password'=>bcrypt("12345678"),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'role'=>1

        ]);
        DB::table('users')->insert([
            'name'=>"Van Quang",
            'email'=>"vanquang@email.com",
            'password'=>bcrypt("12345678"),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'role'=>2

        ]);
        DB::table('users')->insert([
            'name'=>"test user 01",
            'email'=>"user01@gmail.com",
            'password'=>bcrypt("12345678"),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'role'=>3

        ]);
        DB::table('users')->insert([
            'name'=>"test user 02",
            'email'=>"user02@gmail.com",
            'password'=>bcrypt("12345678"),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'role'=>3

        ]);
        DB::table('users')->insert([
            'name'=>"test user 03",
            'email'=>"user03@gmail.com",
            'password'=>bcrypt("12345678"),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'role'=>3

        ]);
    }
}
