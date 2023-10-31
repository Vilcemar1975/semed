<?php

namespace App\Http\Livewire\Plug;

use Livewire\Component;

class ModalArtigoAdd extends Component
{

    public $idmodal;
    public $idfile;
    public $titletop;
    public $title;
    public $img;
    public $texto;
    public $publicdate;
    public $grupo;
    public $route;

    public function render()
    {
        return view('livewire.plug.modal-artigo-add');
    }
}
