<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\UpdatePasswordNotification;
use GrahamCampbell\ResultType\Success;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response()->json(Paciente::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos_validados = $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'identidad' => 'required',
            'direccion' => 'required',
            'telefono' => 'required'
        ]);

        $paciente = Paciente::create($datos_validados);

        $longitud = 8;
        $password = substr(md5(rand()), 0, $longitud);

        $user = User::create([
            'nombre' => $datos_validados['nombres'] . ' ' . $datos_validados['apellidos'],
            'email' => $datos_validados['email'],
            'password' => bcrypt($password),
            'temporal_password' => $password,
            'identidad' => $datos_validados['identidad'],
            'is_admin' => 0
        ]);

        $user->notify(new UpdatePasswordNotification($user));


        return response(200);

        // if ($paciente && $user) {
        //     return response(200);
        // } else {
        //     return response()->json($datos_validados);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
