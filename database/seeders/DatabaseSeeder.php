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
        $this->call(MarcaSeeder::class);
        $this->call(ModeloSeeder::class);
        $this->call(PropietarioSeeder::class);
        $this->call(VehiculoSeeder::class);



        // \App\Models\User::factory(10)->create();
    }
}
