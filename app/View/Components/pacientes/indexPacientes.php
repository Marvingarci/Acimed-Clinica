<?php

namespace App\View\Components\pacientes;

use Illuminate\View\Component;

class indexPacientes extends Component
{
    public $pacientes;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pacientes)
    {
        $this->pacientes = $pacientes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pacientes.index-pacientes');
    }
}
