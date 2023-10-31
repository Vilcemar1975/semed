<?php

namespace App\Livewire\Plug;

use Livewire\Component;

class ListModulo extends Component
{

    public $heads;
    public $lists;

    public $public;
    public $modal_public;
    public $modal_edit;
    public $modal_excluir;
    public $route_edit;
    public $config;
    public $view;

    public $publicicon = true;


    public function render()
    {
        return view('livewire.plug.list-modulo');
    }
}
