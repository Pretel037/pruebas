<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;


    // Especifica la tabla si el nombre del modelo no sigue el plural por defecto
    protected $table = 'registros';

    protected $fillable = [
        'nombres',
        'apellidos',
        'dni',
        'celular',
        'edad',
        'sexo',
        'fecha_nacimiento',
    ];



    public function vouchersValidado()
{
    return $this->hasOne(VoucherValidado::class, 'dni_codigo', 'dni');
}

public function matriculado()
{
    return $this->hasOne(Matriculado::class, 'registro_id');
}
}
