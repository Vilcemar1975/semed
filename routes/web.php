<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CoreController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [IndexController::class, 'index'])->name('welcome');
Route::get('/secretaria', [IndexController::class, 'secretariaShow'])->name('secretaria');
Route::get('/noticias', [IndexController::class, 'noticias'])->name('noticias');
Route::get('/ensinaon', [IndexController::class, 'ensinaon'])->name('ensinaon');
Route::get('/nte', [IndexController::class, 'nte'])->name('nte');
Route::get('/atividades', [IndexController::class, 'atividadeEducacional'])->name('atividades');
Route::get('/biblioteca', [IndexController::class, 'biblioteca'])->name('biblioteca');
Route::get('/escolas', [IndexController::class, 'escolas'])->name('escolas');
Route::get('/tutoriais', [IndexController::class, 'tutoriais'])->name('tutoriais');

/* Sub paginas */
Route::get('/calendarios', [IndexController::class, 'showCalendarios'])->name('calendarios');

Route::get('/dashboard', function () {

    $ativar = 'dashboard';
    $dados = CoreController::conjuntoVariaveisDashboard();

    return view('backoffice.dashboard', compact('dados','ativar'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dash/artigo', [DashboardController::class, 'DashArtigo'])->name('dashartigo');
    Route::get('/dash/artigo/add/{id?}', [DashboardController::class, 'DashArtigoAdd'])->name('dashartigoadd');
    Route::get('/dash/video', [DashboardController::class, 'DashVideo'])->name('dashvideo');
    Route::get('/dash/video/add/{id?}', [DashboardController::class, 'DashVideoAdd'])->name('dashvideoadd');
    Route::get('/dash/calendar', [DashboardController::class, 'DashCalendar'])->name('dashcalendar');
    Route::get('/dash/calendar/add/{id?}', [DashboardController::class, 'DashCalendarAdd'])->name('dashcalendaradd');
    Route::get('/dash/atividade', [DashboardController::class, 'DashAtividade'])->name('dashatividade');
    Route::get('/dash/atividade/add/{id?}', [DashboardController::class, 'DashAtividadeAdd'])->name('dashatividadeadd');
    Route::get('/dash/eventos', [DashboardController::class, 'DashEventos'])->name('dasheventos');
    Route::get('/dash/eventos/add/{id?}', [DashboardController::class, 'DashEventosAdd'])->name('dasheventosadd');
    Route::get('/dash/graficos', [DashboardController::class, 'DashGraficos'])->name('dashgraficos');
    Route::get('/dash/graficos/add/{id?}', [DashboardController::class, 'DashGraficosAdd'])->name('dashgraficosadd');
    Route::get('/dash/jogos', [DashboardController::class, 'DashJogos'])->name('dashjogos');
    Route::get('/dash/jogos/add/{id?}', [DashboardController::class, 'DashJogosAdd'])->name('dashjogosadd');
    Route::get('/dash/livros', [DashboardController::class, 'DashLivros'])->name('dashlivros');
    Route::get('/dash/livros/add/{id?}', [DashboardController::class, 'DashLivrosAdd'])->name('dashlivrosadd');
    Route::get('/dash/processos', [DashboardController::class, 'DashProcessos'])->name('dashprocessos');
    Route::get('/dash/processos/add/{id?}', [DashboardController::class, 'DashProcessosAdd'])->name('dashprocessosadd');
    Route::get('/dash/dorcente', [DashboardController::class, 'DashDorcente'])->name('dashdorcente');
    Route::get('/dash/dorcente/add/{id?}', [DashboardController::class, 'DashDorcenteAdd'])->name('dashdorcenteadd');
    Route::get('/dash/usuarios', [DashboardController::class, 'DashUsuarios'])->name('dashusuarios');
    Route::get('/dash/usuarios/add/{id?}', [DashboardController::class, 'DashUsuariosAdd'])->name('dashusuariosadd');
    Route::get('/dash/config', [DashboardController::class, 'DashConfig'])->name('dashconfig');

});

require __DIR__.'/auth.php';
