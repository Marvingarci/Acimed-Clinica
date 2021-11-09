<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    { //esta estructura tendra siempre que sea POST
        $this->validateLogin($request);

        // si se valida se manda lo que esta dentro del if 
        if (Auth::attempt($request->only('identidad', 'password'))) {
            $paciente = Paciente::where('identidad', Auth::user()->identidad)->first();
            return response()->json([
                'paciente' => $paciente,
                'token' => $request->User()->createToken($request->identidad)->plainTextToken, //Aqui  reevia el token para su autenticacion
                'message' => 'Success'
            ]);
        }
        //sino se enviara esto
        return response()->json([
            'message' => 'Unauthorizated'
        ], 401);
    }
    public function validateLogin(Request $request) // esta funcion solo es para validar los archivos que vienen del formulario
    {
        return $request->validate([
            // 'email' => 'required|email',
            'identidad' => 'required',
            'password' => 'required',
        ]);
    }
}
