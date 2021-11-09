<?php

namespace App\Http\Livewire\Pacientes;

use App\Models\Paciente;
use Livewire\Component;

class Pacientes extends Component
{
    public function render()
    {
        return view('livewire.pacientes.pacientes', [
            'pacientes' => Paciente::paginate(5)
        ]);
    }
}
