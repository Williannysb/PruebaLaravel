<?php

namespace Database\Seeders;

use App\Models\Propietario;
use Illuminate\Database\Seeder;

class PropietarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Propietario::create([
            'id' => '1',
            'cedula' => '22198717',
            'nombre' => 'Jose',
            'apellido' => 'Rodriguez',
            'fecha_nac' => '1993-03-05',

        ]);
        Propietario::create([
            'id' => '2',
            'cedula' => '22458963',
            'nombre' => 'Marta',
            'apellido' => 'Perez',
            'fecha_nac' => '1994-02-02',

        ]);
    }
}
