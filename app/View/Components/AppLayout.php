<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

use App\Http\Controllers\CoreController;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('layouts.app', compact(['dados']));
    }
}
