<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matriculado extends Model
{
    use HasFactory;
    protected $table = 'matriculados';

    protected $fillable = [
        'nombres',
        'apellidos',
        'dni',
        'registro_id',
        'matricula_id',
        'voucher_validado_id',
        'user_id',
    ];

    public function registro()
    {
        return $this->belongsTo(Registro::class, 'registro_id');
    }
    
    public function voucherValidado()
    {
        return $this->belongsTo(VoucherValidado::class, 'voucher_validado_id');
    }

 

    public function matricula()
    {
        return $this->belongsTo(Matricula::class);
    }

 

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
