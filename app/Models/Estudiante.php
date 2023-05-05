<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    public $table = 'estudiantes';
    protected $fillable = [
        'firstName',
        'lastName',
        'photo',
    ];
    public function cursos(){
        return $this->belongsToMany(Curso::class, 'curso_estudiante');
    }
}
