<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CoreController;

class IndexController extends Controller
{
    public function index() {
        $icos = CoreController::iconBootStrap();
        $menus = CoreController::menuPrincipal();
        return view('welcome', compact('icos', 'menus'));
    }
}
