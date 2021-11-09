<?php

namespace App\Http\Livewire\Doctores;

use App\Models\DiasLaborales;
use App\Models\Doctor;
use App\Models\User;
use App\Notifications\UpdatePasswordNotification;
use Livewire\Component;
use PhpParser\Node\Stmt\Foreach_;

class FormDoctores extends Component
{
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
        'temporal_password' => ''
    ];

    public $dias = [
        'doctor_id' => 0,
        'lunes' => false,
        'martes' => false,
        'miercoles' => false,
        'jueves' => false,
        'viernes' => false,
        'sabado' => false,
        'domingo' => false
    ];


    public $diasLaborales = [];
    public function render()
    {
        return view('livewire.doctores.form-doctores');
    }
    
    public function mount()
    {
        $this->diasLaborales=[];
    }

    public function submit()
    {
        $this->validate([
            'data.nombre_doctor' => 'required',
            'data.apellido_doctor' => 'required',
            'data.identidad' => 'required | size:13 | unique:doctors,identidad',
            'data.email' => 'required | email | unique:doctors,email',
            'data.direccion' => 'required',
            'data.telefono' => 'required | size:8 | unique:doctors,telefono',
            'data.especialidad' => 'required',
            'data.hora_inicio' => 'required',
            'data.hora_final' => 'required '

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
            'data.hora_inicial.required' => 'La hora inicial es obligatorio',
            'data.hora_final.required' => 'La hora final es obligatorio',

        ]);
        
        $doctor = Doctor::create($this->data);
        $this->dias['doctor_id'] = $doctor->id;
        DiasLaborales::create($this->dias);
              
        $longitud = 8;
        $password = substr(md5(rand()), 0, $longitud);

        $this->data['temporal_password'] = $password;
        
        $user = new User();
        $user->nombre = $this->data['nombre_doctor'];
        $user->email = $this->data['email'];
        $user->password = bcrypt($password);
        $user->temporal_password = $password;
        $user->identidad =  $this->data['identidad'];
        $user->is_admin = 0;
        $user->save();

        $user->notify(new UpdatePasswordNotification($user));

        return redirect('/doctores');
    }
}
