<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowModulo extends Component
{
    public $botao;
    public $route;


    public function render()
    {
        return view('livewire.show-modulo');
    }
}
