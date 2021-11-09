<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Notifications\UpdatePasswordNotification;
use Illuminate\Http\Request;

class DoctoresController extends Controller
{
    function index(){
        
        return view('doctores.lista_doctores')->with('doctores',Doctor::all());
    }

    function create(){
        return view('doctores.formulario_doctores');
    }

    function edit($doc){
        $doctor = Doctor::where('id', $doc)->first();
        return view('doctores.editar_doctores')->with('doctor', $doctor);
    }

    function store(Request $request){

        $this->validate($request,[
            'nombres' => 'required',
            'apellidos' => 'required',
            'identidad' => 'required | size:13 | unique:doctors,identidad',
            'correo' => 'required | email | unique:doctors,email',
            'direccion' => 'required',
            'telefono' => 'required | size:8 | unique:doctors,telefono',
            'especialidad' => 'required'
        ], [
            'nombres.required' => 'Ingrese el nombre',
            'apellidos.required' => 'Ingrese los apellidos',
            'identidad.required' => 'Ingrese la identidad',
            'identidad.unique' => 'Esta identidad pertenece a otro usuario',
            'identidad.size' => 'Esta identidad debe tener 13 caracteres',
            'correo.email' => 'Ingrese un correo válido',
            'correo.unique' => 'Este correo ya pertenece a otra persona',
            'telefono.size' => 'Ingrese un numero válido',
            'telefono.unique' => 'Esta teléfono pertenece a otro usuario',
        ]);
        
        $doc = new Doctor();
        $doc->nombre_doctor =$request->input('nombres');
        $doc->apellido_doctor =$request->input('apellidos');
        $doc->identidad =$request->input('identidad');
        $doc->email =$request->input('correo');
        $doc->direccion =$request->input('direccion');
        $doc->telefono =$request->input('telefono');
        $doc->especialidad =$request->input('especialidad');
        $doc->save();

        $longitud = 8;
        $password = substr(md5(rand()), 0, $longitud);
        
        $user = new User();
        $user->nombre =$request->input('nombres');
        $user->email =$request->input('correo');
        $user->password = bcrypt($password);
        $user->temporal_password = $password;
        $user->identidad = $request->identidad;
        $user->is_admin = 1;
        $user->save();

        $user->notify(new UpdatePasswordNotification($user));

        return view('doctores.lista_doctores')->with('doctores', Doctor::all());
    }

    function update($doc, Request $request){

        $this->validate($request,[
            'nombres' => 'required',
            'apellidos' => 'required',
            'identidad' => 'required | size:13 ',
            'correo' => 'required | email ',
            'direccion' => 'required',
            'telefono' => 'required | size:8',
            'especialidad' => 'required'
        ], [
            'nombres.required' => 'Ingrese el nombre',
            'apellidos.required' => 'Ingrese los apellidos',
            'identidad.required' => 'Ingrese la identidad',
            'identidad.unique' => 'Esta identidad pertenece a otro usuario',
            'identidad.size' => 'Esta identidad debe tener 13 caracteres',
            'correo.email' => 'Ingrese un correo válido',
            'correo.unique' => 'Este correo ya pertenece a otra persona',
            'telefono.size' => 'Ingrese un numero válido',
            'telefono.unique' => 'Esta teléfono pertenece a otro usuario',
        ]);

        $doc = Doctor::find($doc);
        $doc->nombre_doctor =$request->input('nombres');
        $doc->apellido_doctor =$request->input('apellidos');
        $doc->identidad =$request->input('identidad');
        $doc->email =$request->input('correo');
        $doc->direccion =$request->input('direccion');
        $doc->telefono =$request->input('telefono');
        $doc->especialidad =$request->input('especialidad');
        $doc->is_admin = 0;
        $doc->update();

        return view('doctores.lista_doctores')->with('doctores', Doctor::all());
    }
}
