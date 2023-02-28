<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehiculo extends Model
{
    use HasFactory;


protected $fillable = [
    'id',
  'placa',
  'color',
  'fecha_ingreso',
  'id_modelo',
  'status'

];
public function modelo(){
    return $this->belongsTo(Modelo::class, 'id_modelo');
}

}

