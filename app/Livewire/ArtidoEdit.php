<?php

namespace App\Livewire;

use Livewire\Component;

class ArtidoEdit extends Component
{
    public $artigo;

    public function render()
    {
        return view('livewire.artido-edit');
    }
}
