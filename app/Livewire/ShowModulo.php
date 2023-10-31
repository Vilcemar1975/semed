<?php

namespace App\Livewire;

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
