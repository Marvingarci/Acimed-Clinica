<?php

namespace App\Http\Livewire\Doctores;

use App\Models\DiasLaborales;
use App\Models\Doctor;
use Livewire\Component;

class EditDoctores extends Component
{
    public $doctor;
    public $data = [
        'nombre_doctor' => '',
        'apellido_doctor' => '',
        'email' => '',
        'telefono' => '',
        'especialidad' => '',
        'direccion' => '',
        'identidad' => '',
        'hora_inicio' => '',
        'hora_final' => '',
    ];
    public $dias = [
        'lunes' => false,
        'martes' => false,
        'miercoles' => false,
        'jueves' => false,
        'viernes' => false,
        'sabado' => false,
        'domingo' => false
    ];
    public function render()
    {
        return view('livewire.doctores.edit-doctores');
    }


    public function mount($id)
    {
        $this->doctor = Doctor::where('id', $id)->first();
        $this->doctor->diasLaborales;
        $this->data['nombre_doctor'] = $this->doctor->nombre_doctor;
        $this->data['apellido_doctor'] = $this->doctor->apellido_doctor;
        $this->data['email'] = $this->doctor->email;
        $this->data['telefono'] = $this->doctor->telefono;
        $this->data['especialidad'] = $this->doctor->especialidad;
        $this->data['direccion'] = $this->doctor->direccion;
        $this->data['identidad'] = $this->doctor->identidad;
        $this->data['hora_inicio'] = $this->doctor->hora_inicio;
        $this->data['hora_final'] = $this->doctor->hora_final;
        $this->dias['lunes'] =  $this->doctor->diasLaborales[0]->lunes;
        $this->dias['martes'] = $this->doctor->diasLaborales[0]->martes;
        $this->dias['miercoles'] = $this->doctor->diasLaborales[0]->miercoles;
        $this->dias['jueves'] = $this->doctor->diasLaborales[0]->jueves;
        $this->dias['viernes'] = $this->doctor->diasLaborales[0]->viernes;
        $this->dias['sabado'] = $this->doctor->diasLaborales[0]->sabado;
        $this->dias['domingo'] = $this->doctor->diasLaborales[0]->domingo;
       
    }

    public function edit()
    {
        $this->validate([
            'data.nombre_doctor' => 'required',
            'data.apellido_doctor' => 'required',
            'data.identidad' => 'required | size:13 ',
            'data.email' => 'required | email ',
            'data.direccion' => 'required',
            'data.telefono' => 'required | size:8 ',
            'data.especialidad' => 'required',
            'data.hora_inicio' => 'required',
            'data.hora_final' => 'required'
        ], [
            'data.nombre_doctor.required' => 'Ingrese el nombre',
            'data.apellido_doctor.required' => 'Ingrese los apellidos',
            'data.identidad.required' => 'Ingrese la identidad',
            'data.identidad.unique' => 'Esta identidad pertenece a otro usuario',
            'data.identidad.size' => 'Esta identidad debe tener 13 caracteres',
            'data.email.required' => 'El correo es obligatorio',
            'data.email.email' => 'Ingrese un correo válido',
            'data.email.unique' => 'Este correo ya pertenece a otra persona',
            'data.telefono.size' => 'Ingrese un numero válido',
            'data.telefono.unique' => 'Esta teléfono pertenece a otro usuario',
            'data.especialidad.required' => 'La especialidad es obligatorio',
            'data.hora_inicio.required' => 'La hora inicial es obligatoria',
            'data.hora_final.required' => 'La hora final es obligatoria',

        ]);

        $this->doctor->nombre_doctor=$this->data['nombre_doctor'];
        $this->doctor->apellido_doctor=$this->data['apellido_doctor'];
        $this->doctor->email=$this->data['email'];
        $this->doctor->telefono=$this->data['telefono'];
        $this->doctor->especialidad=$this->data['especialidad'];
        $this->doctor->direccion=$this->data['direccion'];
        $this->doctor->identidad=$this->data['identidad'];
        $this->doctor->hora_inicio=$this->data['hora_inicio'];
        $this->doctor->hora_final=$this->data['hora_final'];

        $dias = DiasLaborales::find( $this->doctor->diasLaborales[0]->doctor_id);
        $dias->lunes= $this->dias['lunes'];
        $dias->martes=$this->dias['martes'];
        $dias->miercoles=$this->dias['miercoles'];
        $dias->jueves= $this->dias['jueves'];
        $dias->viernes= $this->dias['viernes'];
        $dias->sabado= $this->dias['sabado'];
        $dias->domingo= $this->dias['domingo'];

        $this->doctor->update();
        $dias->update();

        return redirect('/doctores');

    }
}
