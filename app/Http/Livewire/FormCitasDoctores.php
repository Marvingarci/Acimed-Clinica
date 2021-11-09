<?php

namespace App\Http\Livewire;

use App\Models\Cita;
use App\Models\Doctor;
use App\Models\usuario;
use Illuminate\Database\QueryException;
use Livewire\Component;
use App\Http\Controllers\EventoController;
use SebastianBergmann\Environment\Console;

class FormCitasDoctores extends Component
{
    public $doctor_id = 0;
    public $fecha;
    public $hora;
    public $motivo;
    public $estado;
    public $citas;

    public $id_cita;

    public function render()
    {
        $this->citas = Cita::where("doctor_id", "=", $this->doctor_id)->orderByDesc('fecha')->get();

        return view('livewire.form-citas-doctores', [
            'doctores' => Doctor::all()
        ])
            ->extends('home')
            ->section('content');
    }

    public function mount(){
        $this->citas = [];
    }

    // public function setCitas($valor)
    // {
    //     dd($valor);
    // }

    public function guardar_cita()
    {

        $validatedData = $this->validate(
            [
                'doctor_id' => 'required',
                'motivo' => 'required',
                'fecha' => 'required',
                'hora' => 'required'
            ],
            [
                'doctor_id.required' => 'Debe de seleccionar un doctor.',
                'motivo.required' => 'Debe escribir un motivo.',
                'fecha.required' => 'Es necesario.',
                'hora.required' => 'Es necesario.',
            ]
        );

        $nombre_dia=$day=date('w', strtotime($this->fecha));

        switch($nombre_dia)
        {
            case 0: $nombre_dia="Domingo";
            break;
            case 1: $nombre_dia="Lunes";
            break;
            case 2: $nombre_dia="Martes";
            break;
            case 3: $nombre_dia="Miercoles";
            break;
            case 4: $nombre_dia="Jueves";
            break;
            case 5: $nombre_dia="Viernes";
            break;
            case 6: $nombre_dia="Sabado";
            break;
        }
        try {
            $nueva_cita = new Cita();

            $nueva_cita->doctor_id = $this->doctor_id;
            $nueva_cita->motivo  = $this->motivo;
            $nueva_cita->dia = $nombre_dia;
            $nueva_cita->hora = $this->hora;
            $nueva_cita->fecha = $this->fecha;
            $nueva_cita->estado = 'A';
            $nueva_cita->save();
            session()->flash('message', 'Cita guardada con éxito');

            $this->motivo="";
            $this->hora="";
            $this->fecha="";

        } catch (QueryException $ex) {
            session()->flash('message', 'El horario no se puede repetir.');
        }

    }


    public function actualizarCita()
    {

        $validatedData = $this->validate(
            [
                'doctor_id' => 'required',
                'motivo' => 'required',
                'fecha' => 'required',
                'hora' => 'required'
            ],
            [
                'doctor_id.required' => 'Debe de seleccionar un doctor.',
                'motivo.required' => 'Debe escribir un motivo.',
                'fecha.required' => 'Es necesario.',
                'hora.required' => 'Es necesario.',
            ]
        );

        $nombre_dia= date('w', strtotime($this->fecha));

        switch($nombre_dia)
        {
            case 0: $nombre_dia="Domingo";
            break;
            case 1: $nombre_dia="Lunes";
            break;
            case 2: $nombre_dia="Martes";
            break;
            case 3: $nombre_dia="Miercoles";
            break;
            case 4: $nombre_dia="Jueves";
            break;
            case 5: $nombre_dia="Viernes";
            break;
            case 6: $nombre_dia="Sabado";
            break;
        }
        try {
            $nueva_cita = Cita::findOrFail($this->id_cita);

            $nueva_cita->doctor_id = $this->doctor_id;
            $nueva_cita->motivo  = $this->motivo;
            $nueva_cita->dia = $nombre_dia;
            $nueva_cita->hora = $this->hora;
            $nueva_cita->fecha = $this->fecha;
            $nueva_cita->estado = 'A';
            $nueva_cita->save();


            $this->motivo="";
            $this->hora="";
            $this->fecha="";

        } catch (QueryException $ex) {
            session()->flash('message', 'El horario no se puede repetir.');
        }
    }

}
