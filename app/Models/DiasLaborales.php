<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiasLaborales extends Model
{
    use HasFactory;

    protected $fillable =[
        'doctor_id',
        'lunes','martes','miercoles','jueves','viernes','sabado','domingo'
    ];

    public function doctor()
    {
       return $this->belongsTo(Doctor::class);
    }
}
