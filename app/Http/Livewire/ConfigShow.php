<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ConfigShow extends Component
{
    public $menuconfig = [
        ['id' => "01", 'title' => "Cria Grupo", 'icon' => "fa-solid fa-people-line", 'route' => "dashgroup", 'active' => true ],
    ];

    public function render()
    {
        return view('livewire.config-show');
    }
}
