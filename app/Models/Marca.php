<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marca extends Model
{
    use HasFactory;


protected $fillable= [
'id',
'nombre',
'descripcion',
'status'

];

private function modelo()
{
  return $this->belongsToMany(Modelo::class);
}

}
