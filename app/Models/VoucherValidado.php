<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherValidado extends Model
{
    use HasFactory;

    protected $table = 'vouchers_validados';
    protected $fillable = [
        'numero_operacion',
        'fecha_pago',
        'monto',
        'dni_codigo',
        'nombres',
        'apellidos',
        'nombre_curso_servicio',
        'estado',
        'voucher_id',
        'pagos_siga_id',
    ];

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }

    public function pagoSiga()
    {
        return $this->belongsTo(PagoSIGGAS::class);
    }

    public function registro()
{
    return $this->belongsTo(Registro::class, 'dni_codigo', 'dni');
}

public function matriculado()
{
    return $this->hasOne(Matriculado::class, 'voucher_validado_id');
}
}
