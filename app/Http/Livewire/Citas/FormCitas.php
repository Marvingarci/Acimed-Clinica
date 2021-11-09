<?php

namespace App\Http\Livewire\Citas;

use App\Models\Cita;
use App\Models\Doctor;
use Livewire\Component;
use Illuminate\Database\QueryException;

class FormCitas extends Component
{
    public $data =[
        'doctor_id' => 0,
        'fecha' => '12/12/2021',
        'dia'=>'',
        'hora'=>'',
        'nombre_paciente'=>'',
        'estado'=>''
    ];

    public $dias = [];

    public $doctorSeleccionado;
    public $citasPorDoctor;
    public $fecha_aviso = "";
    public $dia_error = '';
    public $hora_aviso = "";
    public $hora_inicio= '06:00';
    public $hora_final= '17:00';
    public $modoEdicion = false;
    public $idCitaEdit;
    public $NumeroCitas = 0;

    public function render()
    {
        $this->citasPorDoctor = Cita::where([["doctor_id", "=", $this->data['doctor_id']], ['fecha', $this->data['fecha'] ]])->orderByDesc('fecha')->get();
        $this->NumeroCitas = Cita::where([["doctor_id", "=", $this->data['doctor_id']], ['fecha', $this->data['fecha'] ]])->count();
        return view('livewire.citas.form-citas', [
            'doctores' => Doctor::latest()->get()
        ]);

        
    }
    public function mount(){
        $this->citasPorDoctor = [];
    }


    public function setCitas($id)
    {
        if($id != 0){
            $this->data['doctor_id'] = $id;
            $this->doctorSeleccionado = Doctor::where('id', $id)->first();
            $this->doctorSeleccionado->diasLaborales;
            $this->setDias($this->doctorSeleccionado->diasLaborales);
            $this->setHora();
        }
    }

    public function setDias($diasLaborales)
    {
        $this->dias= [];
        ($diasLaborales[0]->lunes == true) ? array_push($this->dias, "Lunes"): null;
        ($diasLaborales[0]->martes == true) ? array_push($this->dias, "Martes"): null;
        ($diasLaborales[0]->miercoles == true) ? array_push($this->dias, "Miercoles"): null;
        ($diasLaborales[0]->jueves == true) ? array_push($this->dias, "Jueves"): null;
        ($diasLaborales[0]->viernes == true) ? array_push($this->dias, "Viernes"): null;
        ($diasLaborales[0]->sabado == true) ? array_push($this->dias, "Sabado"): null;
        ($diasLaborales[0]->domingo == true) ? array_push($this->dias, "Domingo"): null;
        $this->fecha_aviso= 'Los dias que labora son: ';
        foreach($this->dias as $dia){
            $this->fecha_aviso .= $dia." ";
        }
    }

    public function setHora()
    {
        
        $this->hora_aviso='La hora de atencion es de '.$this->doctorSeleccionado->hora_inicio." a ".$this->doctorSeleccionado->hora_final;
        $this->hora_inicio =  substr($this->doctorSeleccionado->hora_inicio,0,5);
        $this->hora_final = substr($this->doctorSeleccionado->hora_final, 0,5);
    }

    public function guardar_cita()
    {

        $validatedData = $this->validate(
            [
                'data.doctor_id' => 'required',
                'data.nombre_paciente' => 'required',
                'data.fecha' => 'required',
                'data.hora' => 'required'
            ],
            [
                'data.doctor_id.required' => 'Debe de seleccionar un doctor.',
                'data.nombre_paciente.required' => 'Debe escribir un paciente.',
                'data.fecha.required' => 'Es necesario.',
                'data.hora.required' => 'Es necesario.',
            ]
        );

        $nombre_dia=$day=date('w', strtotime($this->data["fecha"]));

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

            if(in_array($nombre_dia, $this->dias)){
                $this->dia_error ='';
            }else{
                $this->dia_error =$nombre_dia.' no atiende este doctor';
                return false;
            }

            if($this->NumeroCitas >= 7){
                session()->flash('message', 'Este doctor ya tiene límite de citas para este día. Seleccione otra fecha');
                return false;
            }

        try {

            if($this->modoEdicion == true){
                $nueva_cita = Cita::findOrfail($this->idCitaEdit);
            }else{
                $nueva_cita = new Cita();
            }

            $nueva_cita->doctor_id = $this->data['doctor_id'];
            $nueva_cita->nombre_paciente  = $this->data['nombre_paciente'];
            $nueva_cita->dia = $nombre_dia;
            $nueva_cita->hora = $this->data['hora'];
            $nueva_cita->fecha = $this->data['fecha'];
            $nueva_cita->estado = '1';

            if($this->modoEdicion == true){
                $nueva_cita->update();
                session()->flash('message', 'Cita Editada con éxito');

            }else{
                $nueva_cita->save();
                session()->flash('message', 'Cita guardada con éxito');
            }

            $this->resetFields();
           

        } catch (QueryException $ex) {

            session()->flash('message', 'Ya existe una cita a esta hora');
        }

    }

    public function editarCita(Cita $citaToEdit)
    {
        $this->data['nombre_paciente']=$citaToEdit->nombre_paciente;
        $this->data['hora']=$citaToEdit->hora;
        $this->data['fecha']=$citaToEdit->fecha;
        $this->modoEdicion = true;
        $this->setCitas($citaToEdit->doctor_id);
        $this->idCitaEdit = $citaToEdit->id;
    }

    public function resetFields()
    {
        $this->data['nombre_paciente']="";
        $this->data['hora']="";
        $this->data['fecha']="";
        $this->fecha_aviso="";
        $this->dia_error="";
        $this->hora_aviso="";
        $this->modoEdicion=false;
    }
}
