<?php

namespace App\Http\Livewire\Doctores;

use App\Models\Doctor;
use Livewire\Component;

class Doctores extends Component
{
    public function render()
    {
        return view('livewire.doctores.doctores',[
            'doctores' => Doctor::paginate(5),
        ]);
    }
}
