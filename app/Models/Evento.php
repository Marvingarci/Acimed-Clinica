<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    use HasFactory;

    
    protected $fillable =[
        'descripcion',
        'fecha',
        'hora'
    ];
}
