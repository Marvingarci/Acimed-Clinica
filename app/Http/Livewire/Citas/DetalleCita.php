<?php

namespace App\Http\Livewire\Citas;

use App\Models\Cita;
use Livewire\Component;

class DetalleCita extends Component
{
    public $event;
    public function render()
    {
        return view('livewire.citas.detalle-cita',[
            'event' => $this->event
        ]);
    }

    public function mount($id)
    {
        $event = Cita::find($id);
        $event->doctor;

        $this->event = $event;
    }
}
