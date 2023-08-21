<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CoreController;

class IndexController extends Controller
{
    public function index() {
        $ativado = "welcome";
        $dados = CoreController::conjuntoVariaveis();

        return view('welcome', compact('dados','ativado'));
    }

    public function noticias() {
        $ativado = "noticias";
        $dados = CoreController::conjuntoVariaveis();

        return view('noticias', compact('dados','ativado'));
    }

    public function nte() {
        $ativado = "nte";
        $dados = CoreController::conjuntoVariaveis();

        return view('nte', compact('dados','ativado'));
    }

    public function ensinaon() {
        $ativado = "ensinaon";
        $dados = CoreController::conjuntoVariaveis();

        return view('ensinaon', compact('dados','ativado'));
    }
}
