<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index_doctores(){
        return User::all();
    }

    public function index_class_doctores($doctor_id){
        return Cita::where('doctor_id','=',$doctor_id)->get();
    }
}
