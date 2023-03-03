<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marca::create([
            'id' => '1',
            'nombre' => 'Toyota',
            'descripcion' => 'Nuevo',

        ]);
        Marca::create([
            'id' => '2',
            'nombre' => 'Ford',
            'descripcion' => 'Nuevo',

        ]);
    }
}
