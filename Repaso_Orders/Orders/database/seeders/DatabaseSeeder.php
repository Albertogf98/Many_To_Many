<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();

       $this->seedUser();
    }

    public function seedUser() {
        DB::table('users')->insert([
            /*'name' => 'admin',
            'email' => 'admin@admin.es',
            'password' => bcrypt('123'),
            'user_type' => 'admin' */
            'name' => 'Alberto',
            'email' => 'a@hotmail.es',
            'password' => bcrypt('123'),
            'user_type' => 'user'
        ]);
    }

    public function seedOrder() {
        DB::table('orders')->insert([
            'date' => now(),
            'name' => 'Martillo',
            'price' => 20.00,
            'units' => 3,
            'image' => 'https://static.wixstatic.com/media/83d118_51f38487282d4e48ba7bb8498e4ecbc5.png/v1/fill/w_1000,h_554,al_c,usm_0.66_1.00_0.01/83d118_51f38487282d4e48ba7bb8498e4ecbc5.png',
            'description' => 'Martillo clásico',
            'user_id' => 2,
        ]);
    }
}
