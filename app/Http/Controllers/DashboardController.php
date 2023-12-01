<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Models\Article;
use App\Http\Controllers\CoreController;
use App\Http\Controllers\SchoolController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;


class DashboardController extends Controller
{
    public function DashArtigo()
    {   $ativar = 'dashartigo';
        $dados = CoreController::conjuntoVariaveisDashboard();
        $artigos = Article::where('trash', false)->paginate(15);

        return view('backoffice.dashartigo', compact(['dados', 'ativar', 'artigos']));
    }

    public function DashArtigoAdd(Request $request)
    {

        return redirect()->route('dashartigoedit',['id' => $artigo->id]);
    }

    public function DashArtigoEdit($id){
        /* $ativar = 'dashartigo';
        $dados = CoreController::conjuntoVariaveisDashboard();
        $artigo = Article::where('id', $id)->first();
        $criadores = ArticleController::GetCreator($artigo->creators)[1];
        $autor = ArticleController::GetCreator($artigo->creators)[0]; */

        /* return view('backoffice.dashartigoadd', ['artigo' => $artigo, 'dados' => $dados, 'ativar' => $ativar, 'criadores' => $criadores, 'autor' => $autor]); */
        return redirect()->route('articleedit', ['id' => $id]);
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

    public function DashCalendar()
    {   $ativar = 'dashcalendar';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashcalendar', compact(['dados', 'ativar']));
    }

    public function DashCalendarAdd($id = null)
    {   $ativar = 'dashcalendar';

        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashcalendaradd', compact(['dados', 'ativar']));
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

    public function DashLinkExterno()
    {   $ativar = 'dashlinkexterno';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashlinkexterno', compact(['dados', 'ativar']));
    }

    public function DashEscola()
    {   $ativar = 'dashescola';
        $dados = CoreController::conjuntoVariaveisDashboard();
        $escolas = SchoolController::ListSchool();


        return view('backoffice.dashescola', compact(['dados', 'ativar', 'escolas']));
    }

    public function DashEscolaAdd(Request $request)
    {

        $escola = SchoolController::CreateSchool($request);


        $ativar = 'dashescola';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashescolasadd', compact(['dados', 'ativar']));
    }

    public function DashConfig()
    {   $ativar = 'dashconfig';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashconfig', compact(['dados', 'ativar']));
    }

    public function DashGroup()
    {   $ativar = 'dashconfig';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashgroup', compact(['dados', 'ativar']));
    }

}

