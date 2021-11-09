<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_doctor',
        'apellido_doctor',
        'identidad',
        'email',
        'direccion',
        'telefono',
        'especialidad',
        'hora_inicio',
        'hora_final',
        'password',
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
    public function diasLaborales()
    {
        return $this->hasMany(DiasLaborales::class);
    }
}

