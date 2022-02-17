<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(2)->create();
        \App\Models\Admin::factory(1)->create();
        \App\Models\Client::factory(1)->create();
        \App\Models\Commodite::factory(10)->create();
        \App\Models\TypeBien::factory(3)->create();
        \App\Models\Lieu::factory(22)->create();
        \App\Models\Bien::factory(20)->create();
        \App\Models\Visuel::factory(60)->create();
        \App\Models\Favori::factory(12)->create();
        \App\Models\Alerte::factory(25)->create();
        \App\Models\CommoditeBien::factory(12)->create();
    }
}
