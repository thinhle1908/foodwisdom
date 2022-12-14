<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersSeeder::class]);
        $this->call([ProductsSeeder::class]);
        $this->call([CategorysSeeder::class]);
        $this->call([Category_ProductsSeeder::class]);
        $this->call([RolesSeeder::class]);
        $this->call([OrderSeeder::class]);
    }
}
