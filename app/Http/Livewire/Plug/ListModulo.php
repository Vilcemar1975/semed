<?php

namespace App\Http\Livewire\Plug;

use Livewire\Component;

class ListModulo extends Component
{

    public $heads;
    public $lists;

    public $public;
    public $config;
    public $view;

    public $publicicon = true;


    public function render()
    {
        return view('livewire.plug.list-modulo');
    }
}
