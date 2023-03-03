<?php

namespace Database\Seeders;

use App\Models\Vehiculo;
use Illuminate\Database\Seeder;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehiculo::create([
            'id' => '1',
            'placa' => 'FJH002',
            'color' => 'Blanco',
            'fecha_ingreso' => '2022-03-05',
            'id_modelo' => '1',
            'id_propietario' => '1',
        ]);
        Vehiculo::create([
            'id' => '2',
            'placa' => 'GH54LD',
            'color' => 'Negro',
            'fecha_ingreso' => '2021-02-02',
            'id_modelo' => '2',
            'id_propietario' => '2',
        ]);
    }
}
