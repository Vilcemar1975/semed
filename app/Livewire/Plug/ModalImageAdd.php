<?php

namespace App\Livewire\Plug;

use Livewire\Component;

class ModalImageAdd extends Component
{

    public $idmodal;
    public $idfile;
    public $titletop;
    public $title;
    public $img;
    public $texto;
    public $publicdate;
    public $grupo;


    public function render()
    {

        return view('livewire.plug.modal-image-add');
    }
}
