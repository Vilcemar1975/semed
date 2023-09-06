<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CoreController;


class DashboardController extends Controller
{
    public function DashArtigo()
    {   $ativar = 'dashartigo';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashartigo', compact(['dados', 'ativar']));
    }

    public function DashArtigoAdd($id = null)
    {   $ativar = 'dashartigo';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashartigoadd', compact(['dados', 'ativar']));
    }

    public function DashVideo()
    {   $ativar = 'dashvideo';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashvideo', compact(['dados', 'ativar']));
    }

    public function DashVideoAdd($id = null)
    {   $ativar = 'dashvideo';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashvideoadd', compact(['dados', 'ativar']));
    }

    public function DashAtividade()
    {   $ativar = 'dashatividade';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashatividade', compact(['dados', 'ativar']));
    }

    public function DashAtividadeAdd($id = null)
    {   $ativar = 'dashatividade';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashatividadeadd', compact(['dados', 'ativar']));
    }

    public function DashEventos()
    {   $ativar = 'dasheventos';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dasheventos', compact(['dados', 'ativar']));
    }

    public function DashEventosAdd($id = null)
    {   $ativar = 'dasheventos';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dasheventosadd', compact(['dados', 'ativar']));
    }

    public function DashGraficos()
    {   $ativar = 'dashgraficos';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashgraficos', compact(['dados', 'ativar']));
    }

    public function DashGraficosAdd($id = null)
    {   $ativar = 'dashgraficos';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashgraficosadd', compact(['dados', 'ativar']));
    }

    public function DashJogos()
    {   $ativar = 'dashjogos';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashjogos', compact(['dados', 'ativar']));
    }

    public function DashJogosAdd($id = null)
    {   $ativar = 'dashjogos';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashjogosadd', compact(['dados', 'ativar']));
    }

    public function DashLivros()
    {   $ativar = 'dashlivros';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashlivros', compact(['dados', 'ativar']));
    }

    public function DashLivrosAdd($id = null)
    {   $ativar = 'dashlivros';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashlivrosadd', compact(['dados', 'ativar']));
    }

    public function DashProcessos()
    {   $ativar = 'dashprocessos';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashprocessos', compact(['dados', 'ativar']));
    }

    public function DashProcessosAdd($id = null)
    {   $ativar = 'dashprocessos';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashprocessosadd', compact(['dados', 'ativar']));
    }

    public function DashDorcente()
    {   $ativar = 'dashdorcente';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashdorcente', compact(['dados', 'ativar']));
    }

    public function DashDorcenteAdd($id = null)
    {   $ativar = 'dashdorcente';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashdorcenteadd', compact(['dados', 'ativar']));
    }

    public function DashUsuarios()
    {   $ativar = 'dashusuarios';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashusuarios', compact(['dados', 'ativar']));
    }

    public function DashUsuariosAdd($id = null)
    {   $ativar = 'dashusuarios';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashusuariosadd', compact(['dados', 'ativar']));
    }

    public function DashConfig()
    {   $ativar = 'dashconfig';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashconfig', compact(['dados', 'ativar']));
    }
}

