<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'nombre_paciente',
        'dia',
        'fecha',
        'hora',
        'estado'
    ];
    
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

}
