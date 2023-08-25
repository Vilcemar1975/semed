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

    public function atividadeEducacional() {
        $ativado = "atividades";
        $dados = CoreController::conjuntoVariaveis();

        return view('atividades', compact('dados','ativado'));
    }

    public function biblioteca() {
        $ativado = "biblioteca";
        $dados = CoreController::conjuntoVariaveis();

        return view('biblioteca', compact('dados','ativado'));
    }

    public function escolas() {
        $ativado = "escolas";
        $dados = CoreController::conjuntoVariaveis();

        return view('escolas', compact('dados','ativado'));
    }

    public function tutoriais() {
        $ativado = "tutoriais";
        $dados = CoreController::conjuntoVariaveis();

        return view('tutoriais', compact('dados','ativado'));
    }
}
