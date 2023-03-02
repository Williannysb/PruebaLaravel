<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;

protected $fillable = [
  'id',
  'cedula',
  'nombre',
  'apellido',
  'fecha_nac',
  'status'

];
public function vehiculo(){
    return $this->belongsToMany(Vehiculo::class);
}

}
