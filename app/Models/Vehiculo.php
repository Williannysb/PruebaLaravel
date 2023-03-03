<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'placa',
        'color',
        'fecha_ingreso',
        'id_modelo',
        'id_propietario',
        'status',

    ];
    public function modelo()
    {
        return $this->belongsTo(Modelo::class, 'id_modelo');
    }
    public function propietario()
    {
        return $this->belongsTo(Propietario::class, 'id_propietario');
    }

}
