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
       // $this->seedBook();
     //  $this->seedUser();
        $this->seedBookUser();

    }

    public function seedUser()
    {
        DB::table('users')->insert([
            'name' => 'Belén',
            'second_name' => 'Jimenez Ranchal',
            'email' => 'bjiran@biblioteca.es',
            'user_type' => 'admin',
            'password' => bcrypt('200620'),
            ]);
    }

    public function seedBook() {
        DB::table('books')->insert([
            'Title' => 'La Biblia',
            'author' => 'JC',
            'editorial' => 'JC',
        ]);
    }

    public function seedBookUser() {
        DB::table('book_user')->insert([
            'book_id' =>  12,
            'user_id' =>  4,
            'lending_date' => now(),
        ]);
    }
}
