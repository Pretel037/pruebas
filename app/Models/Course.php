<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'name',
        'period',
        'session_link',
        'description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }
}
