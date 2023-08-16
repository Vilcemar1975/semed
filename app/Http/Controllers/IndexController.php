<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CoreController;

class IndexController extends Controller
{
    public function index() {
        $dados = CoreController::conjuntoVariaveis();

        return view('welcome', compact('dados'));
    }
}
