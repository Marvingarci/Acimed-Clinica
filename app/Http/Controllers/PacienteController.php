<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\User;
use App\Notifications\UpdatePasswordNotification;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as FacadesRoute;

class PacienteController extends Controller
{
    public function store(Request $request)
    {
    
        Paciente::create($request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'identidad' => 'required',
            'direccion' => 'required',
            'telefono' => 'required'
        ]));

        $longitud = 8;
        $password = substr(md5(rand()), 0, $longitud);

        $user = User::create([
            'nombre' => $request->nombres . ' ' . $request->apellidos,
            'email' => $request->email,
            'password' => bcrypt($password),
            'temporal_password' => $password,
            'identidad' => $request->identidad,
            'is_admin' => 0
        ]);

        $user->notify(new UpdatePasswordNotification($user));

        
        return back();
   
    }
}
