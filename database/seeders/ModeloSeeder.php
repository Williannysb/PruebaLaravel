<?php

namespace Database\Seeders;

use App\Models\Modelo;
use Illuminate\Database\Seeder;

class ModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modelo::create([
            'id' => '1',
            'nombre' => 'Corolla',
            'descripcion' => 'Nuevo',
            'id_marca' => '1',

        ]);
        Modelo::create([
            'id' => '2',
            'nombre' => 'Camry',
            'descripcion' => 'Nuevo',
            'id_marca' => '1',

        ]);
        Modelo::create([
            'id' => '3',
            'nombre' => 'Fiesta Power',
            'descripcion' => 'Nuevo',
            'id_marca' => '2',
        ]);
        Modelo::create([
            'id' => '4',
            'nombre' => 'Explorer',
            'descripcion' => 'Nuevo',
            'id_marca' => '2',
        ]);
    }
}
