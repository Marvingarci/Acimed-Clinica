<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Doctor::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor = Doctor::create($this->ValidateDoctor($request));
        return response()->json([
            'message' => 'Sucessful'
        ], 201);
    }

    function ValidateDoctor(Request $request)
    {
        return $request->validate([
            'nombre_doctor' => 'required',
            'apellido_doctor' => 'required',
            'identidad' => 'required | size:13 | unique:doctors,identidad',
            'email' => 'required | email | unique:doctors,email',
            'direccion' => 'required',
            'telefono' => 'required | size:8 | unique:doctors,telefono',
            'especialidad' => 'required',
            'hora_inicio' => 'required',
            'hora_final' => 'required '

        ], [
            'nombre_doctor.required' => 'Ingrese el nombre',
            'apellido_doctor.required' => 'Ingrese los apellidos',
            'identidad.required' => 'Ingrese la identidad',
            'identidad.unique' => 'Esta identidad pertenece a otro usuario',
            'identidad.size' => 'Esta identidad debe tener 13 caracteres',
            'email.required' => 'El correo es obligatorio',
            'email.email' => 'Ingrese un correo válido',
            'email.unique' => 'Este correo ya pertenece a otra persona',
            'telefono.size' => 'Ingrese un numero válido',
            'telefono.unique' => 'Esta teléfono pertenece a otro usuario',
            'especialidad.required' => 'La especialidad es obligatorio',
            'hora_inicial.required' => 'La hora inicial es obligatorio',
            'hora_final.required' => 'La hora final es obligatorio',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Doctor::where('id', $id)->first());
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
