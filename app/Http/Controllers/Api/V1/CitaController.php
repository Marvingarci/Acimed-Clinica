<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Cita::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'doctor_id' => 'required',
            'nombre_paciente' => 'required',
            'dia' => 'nullable',
            'fecha' => 'required',
            'hora' => 'required',
            'estado' => 'required',
        ]);

        $dia = new Carbon($validated['fecha']);

        // $hora = new Carbon($validated['hora']);
        // $hora->format("HH:mm aa")
        
        Cita::create([
            'doctor_id' => $validated['doctor_id'],
            'nombre_paciente' => $validated['nombre_paciente'],
            'dia' => $dia->dayName,
            'fecha' => $validated['fecha'],
            'hora' => $validated['hora'],
            'estado' => $validated['estado']
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
