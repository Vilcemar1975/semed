<?php

namespace App\Livewire;

use App\Http\Controllers\CoreController;
use Livewire\Component;
use App\Models\Article;
use Livewire\WithPagination;

use function Pest\Laravel\json;

class ArticleShow extends Component
{
    use WithPagination;

    public $dados;
    public $articleheads = [];
    public $artigos;
    public $articles = [];
    public $publics = [];
    public $articlesPaginatio;




    public function mount(){

        $this->dados = CoreController::conjuntoVariaveisDashboard();

        $this->articleheads = [ 'id' => "id", 'titulo' => 'Titulo',  'action' => "Publicado/Editar/Excluir" ];

        $this->artigos = Article::where('trash', false)->paginate(15);

        if (count($this->artigos) > 0 ) {
            foreach($this->artigos as $artigo){

                $publicdb = $artigo->status;
                array_push($publicdb, $artigo->id);

                array_push( $this->articles, ['id' => $artigo->id, 'title' => $artigo->title, 'public' =>   $publicdb['public'], 'status' => $publicdb]);

            }
        }

    }

    public function render()
    {

        return view('livewire.article-show', [
            'pagiantio' => Article::paginate(10),
        ]);
    }

}
