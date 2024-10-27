<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function certificados()
    {
        return $this->hasMany(UserCertificado::class);
    }

    public function cursos()
    {
        return $this->belongsToMany(Course::class, 'course_user');
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    public function matriculados()
    {
        return $this->hasMany(Matriculado::class);
    }}