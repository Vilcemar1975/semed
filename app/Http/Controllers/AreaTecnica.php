<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CoreController;

class AreaTecnica extends Controller
{

    public function DashInicio()
    {   $ativar = 'dashinicio';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.tecnico.dashtecnico', compact(['dados', 'ativar']));
    }

    public function DashTecnicoEscola()
    {   $ativar = 'dashtecescola';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.tecnico.dashtecescola', compact(['dados', 'ativar']));
    }
}
