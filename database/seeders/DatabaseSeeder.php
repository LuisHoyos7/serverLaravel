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
        \App\Models\IdentificationType::create([
                'name' => 'cedula ciudadania'
            ]);
        \App\Models\UserApi::factory(1)->create();
        
    }
}
