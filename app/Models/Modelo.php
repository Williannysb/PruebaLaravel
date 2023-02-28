<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modelo extends Model
{
    use HasFactory;


    protected $fillable =[
    'id',
    'nombre',
    'descripcion',
    'id_marca',
    'status'
    ];
    public function vehiculo(){
    return $this->HasMany(Vehiculo::class);
}
public function marca(){
    return $this->belongsTo(Marca::class, 'id_marca');
}


}
