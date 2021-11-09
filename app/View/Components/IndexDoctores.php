<?php

namespace App\View\Components;

use Illuminate\View\Component;

class IndexDoctores extends Component
{
    public $doctores;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($doctores)
    {
        $this->doctores = $doctores;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.index-doctores');
    }
}
