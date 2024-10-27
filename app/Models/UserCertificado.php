<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCertificado extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'certificado_id',
        'nota_final',
        'fecha_obtencion',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function certificado()
    {
        return $this->belongsTo(Certificado::class);
    }
}
