<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoSIGGAS extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_operacion',
        'nombres',
        'apellidos',
        'monto_pago',
        'fecha_pago',
        'hora',
        'dni',
        'sucursal',
    ];
}
