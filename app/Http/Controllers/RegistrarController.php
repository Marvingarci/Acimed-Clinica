<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\User;
use App\Notifications\UpdatePasswordNotification;
use Illuminate\Http\Request;

class RegistrarController extends Controller
{
    public function registrar_paciente(Request $request)
    {
        $datos_validados = $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email',
            'identidad' => 'required|numeric|digits:13',
            'direccion' => 'required',
            'telefono' => 'required|numeric|digits:8'
        ], [
            'nombres.required' => 'Debe ingresar los nobmres.',
            'apellidos.required' => 'Debe ingresar los apellidos.',
            'email.required' => 'Debe ingresar el correo electrónico.',
            'email.email' => 'El correo electrónico no es válido.',
            'identidad.required' => 'Debe ingresar la identidad.',
            'identidad.numeric' => 'Solo debe ingresar números.',
            'identidad.digits' => 'Número de identidad no válido.',
            'direccion.required' => 'Debe ingresar la dirección.',
            'telefono.required' => 'Debe ingresar el número de teléfono.',
            'telefono.numeric' => 'Solo debe ingresar números.',
            'telefono.digits' => 'Número de teléfono no válido.',

        ]);

        $paciente = Paciente::create($datos_validados);

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

        if ($paciente && $user) {
            return redirect()->route('login');
        }else{
            return back()->withErrors($datos_validados);
        }
    }
}
