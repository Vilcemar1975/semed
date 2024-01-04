<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CoreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\AndressController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AreaTecnica;
use App\Http\Controllers\CreatorController;
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
    Route::get('/search/user/matricula', [Controller::class, 'SearchUserMatricual'])->name('searchusermatricula');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dash/artigo', [DashboardController::class, 'DashArtigo'])->name('dashartigo');
    Route::get('/dash/artigo/add/{id?}', [DashboardController::class, 'DashArtigoAdd'])->name('dashartigoadd');
    Route::get('/dash/artigo/edit/{id?}', [DashboardController::class, 'DashArtigoEdit'])->name('dashartigoedit');
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
    Route::get('/dash/link', [DashboardController::class, 'DashLinkExterno'])->name('dashlinkexterno');
    Route::get('/dash/escola', [DashboardController::class, 'DashEscola'])->name('dashescola');
    Route::get('/dash/config', [DashboardController::class, 'DashConfig'])->name('dashconfig');
    Route::get('/dash/config/group', [DashboardController::class, 'DashGroup'])->name('dashgroup');

    /* Área Técnica */
    Route::get('/dash/at/inicio', [AreaTecnica::class, 'DashInicio'])->name('dashinicio');
    Route::get('/dash/at/escola', [AreaTecnica::class, 'DashTecnicoEscola'])->name('dashtecescola');

    /* Artigo criar, salva e excluir */
    Route::post('/dash/artigo/save/{id}', [ArticleController::class, 'ArticleSave'])->name('articlesave');
    Route::get('/dash/artigo/editar/{id}', [ArticleController::class, 'ArticleEdit'])->name('articleedit');
    Route::get('/dash/artigo/trash/{id?}', [ArticleController::class, 'ArticleTrash'])->name('articletrash');
    Route::get('/dash/artigo/creator/save/{id?}', [ArticleController::class, 'CriarCriador'])->name('criarcriador');
    Route::get('/dash/artigo/public/{id?}', [ArticleController::class, 'ArticlePublic'])->name('articlepublic');
    Route::get('/dash/artigo/topic/duplicate', [ArticleController::class, 'DuplicateAticle'])->name('duplicateaticle');

    Route::post('/dash/artigo/topic/save/{id}', [TopicsController::class, 'topicSave'])->name('topicsave');
    Route::get('/dash/artigo/topic/public/{id}', [TopicsController::class, 'topicPublic'])->name('topicpublic');
    Route::post('/dash/artigo/topic/alterar/{id}', [TopicsController::class, 'topicAlter'])->name('topicalter');
    Route::get('/dash/artigo/topic/delete/{id}', [TopicsController::class, 'topicErase'])->name('topicerase');

    /* Escola criar, salva e excluir */
    Route::post('/dash/escola/add/{uid?}', [SchoolController::class, 'CreateSchool'])->name('dashescolaadd');
    Route::get('/dash/escola/editarshow/{uid}', [SchoolController::class, 'EditarEscola'])->name('editarescola');
    Route::post('/dash/escola/editar/{uid}', [SchoolController::class, 'EditSchool'])->name('editschool');
    Route::get('/dash/escola/excluir/{uid}', [SchoolController::class, 'ExcluirEscola'])->name('excluirescola');
    Route::get('/dash/escola/search-users', [SchoolController::class, 'SearchUsers'])->name('searchusers');

    /* Endereço criar, salva e excluir */
    Route::get('/dash/endereco/add/{uid}', [AndressController::class, 'AndressSalvar'])->name('andresssalvar');

    /* Galeria criar, Salvar e Excluir */
    Route::post('/dash/galeria/add/{uid?}', [GalleryController::class, 'GalerySaveSchoolImg'])->name('gallerystore');
    Route::get('/dash/galeria/delete/{uid?}', [GalleryController::class, 'DelImg'])->name('delimg');

    /* Imagem criar, Salvar e Excluir */
    Route::post('/dash/img/search/{uid}', [ImageController::class, 'searchImageByUid'])->name('searchimg');
    Route::post('/dash/img/save/{uid}', [ImageController::class, 'saveImg'])->name('saveimg');
    Route::post('/dash/img/saveoneimgscholl', [ImageController::class, 'imgUnicSaveSchoolLogo'])->name('saveoneimgscholl');
    Route::get('/dash/img/delete/{uid}', [ImageController::class, 'deleteImg'])->name('deleteimg');
    Route::get('/dash/img/erase/{uid}', [ImageController::class, 'eraseImg'])->name('eraseimg');

    /* Criar Autores */
    Route::get('/dash/author/create', [CreatorController::class, 'SaveCreatorAuthor'])->name('createupdateauthor');


});


require __DIR__.'/auth.php';
