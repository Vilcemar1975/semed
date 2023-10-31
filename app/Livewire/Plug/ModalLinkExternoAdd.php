<?php

namespace App\Livewire\Plug;

use Livewire\Component;

class ModalLinkExternoAdd extends Component
{
    public $idmodal;
    public $titletop;

    public function render()
    {
        return view('livewire.plug.modal-link-externo-add');
    }
}
