<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Calendario extends Component
{
    public $menuCalendar;
    public $diasemana = array('domingo', 'segunda', 'terça', 'quarta', 'quinta', 'sexta', 'sabado');
    public $selecao = false;
    public $dias;

    public $teste = "";

    public function pegarDia($diasteste)
    {   dd($this->teste = $diasteste);


    }


    public function render()
    {
        return view('livewire.calendario');
    }
}
