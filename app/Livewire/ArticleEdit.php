<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Article;
use App\Models\Creator;
use App\Models\Topic;
use GuzzleHttp\Promise\Create;
use App\Http\Controllers\CreatorController;
use App\Http\Controllers\CoreController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ArticleEdit extends Component
{

    public $artigo;
    public $categorias;
    public $categoria = [];
    public $position_spacials;
    public $position_esp = [];
    public $autor = [];
    public $autores = [];
    public $status;
    public $config;
    public $destaque;
    public $acessos;
    public $acesso = [];
    public $classificacoes = [];

    public $topics = [];
    public $topicheads = [];

    public $typeimg = [];


    //Modal Criador de Autor
    public $id_user;
    public $name_full;
    public $company;
    public $description;

    public function topics(){

        $this->topicheads = [
            'id' => "id",
            "img" => 'Imagem',
            'titulo' => 'Titulo',
            'action' => "Publicado/Editar/Excluir",
        ];

        $topics = Topic::all();

        foreach($topics as $topic){
            array_push($this->topics, ['id' => $topic->id, 'img' => "", 'title' => $topic->title, 'public'=> true]);
        }

    }


    public function mount(){

        //Buscando Artigo
        $article = DB::table('articles')->where('id', $this->artigo)->first();

        $this->artigo = $article;


        //Buscando Categoria
        foreach ($this->categorias as $item){
            if ($item['id'] == $article->category) {
                $this->categoria = $item;
            }
        }

        //Buscando posiçõe especial
        $special_position = $article->special_position == null ? 0 : $article->special_position;
        foreach ($this->position_spacials as $item){
            if ($item['id'] == $special_position) {
                $this->position_esp = $item;
            }
        }

        //Buscando Acesso
        foreach ($this->acessos as $item){
            if ($item['id'] == $article->acesso) {
                $this->acesso = $item;
            }
        }

        //Buscando nome de usuário
        $aut = Creator::find($article->creators);

        if ($aut != null) {
            $this->autor = ['id' =>$aut->id, 'title' => $aut->name_full];
        }else{
            $usuario = User::find($article->id_user);
            $this->autor = ['id' =>$usuario->id, 'title' => $usuario->name." ".$usuario->lastname];
        }

        $autoresdb = Creator::get();

        if (count($autoresdb) > 0) {
            foreach($autoresdb as $item){
                array_push($this->autores, ['id' =>$item->id, 'title' => $item->name_full]);
            }
        }


        //Buscando Tipo de Imagem
        $this->typeimg = CoreController::type();


        //Buscando status
        if ($article->status != null) {
            $stausdb = json_decode($article->status);
            

            $this->status = [
                'public' => $stausdb->public == "public" ? true:false,
                'no_public' => $stausdb->public == "no_public" ? true:false,
                'public_day' => $stausdb->public == "public_day" ? true:false,
                'date_start' => $stausdb->date_start,
                'date_end' => $stausdb->date_end,
                'hour_start' => $stausdb->hour_start,
                'hour_end' => $stausdb->hour_end,
            ];

        }else{

            $this->status = [
                'public' => false,
                'no_public' => true,
                'public_day' => false,
                'date_start' => "",
                'date_end' => "",
                'hour_start' => "",
                'hour_end' => "",
            ];

        }

        //Buscando configuraçôes
        if ($article->config != null){
            $configdb = json_decode($article->config);

            $this->config = [
                'show_author' => $configdb->show_author,
                'show_day_public' => $configdb->show_day_public,
                'show_description' => $configdb->show_description,
                'show_url' => $configdb->show_url,
                'show_download' => $configdb->show_download,
                'show_day_alteration' => $configdb->show_day_alteration,
                'show_author_photo' => $configdb->show_author_photo,
                'show_author_video' => $configdb->show_author_video,
                'show_share' => $configdb->show_share,
                'show_print' => $configdb->show_print,
            ];

        }else{
            $this->config = [
                'show_author' => false,
                'show_day_public' => false,
                'show_description' => false,
                'show_url' => false,
                'show_download' => false,
                'show_day_alteration' => false,
                'show_author_photo' => false,
                'show_author_video' => false,
                'show_shared' => false,
                'show_print' => false,
            ];
        }

        //Classificação de Imagem e Video
        $this->classificacoes = CoreController::classification();

        //Buscando topicos
        self::topics();
    }


    public function SavarCreator(){

        $dados = [
            'id_user' => Auth::id(),
            'name_full' => $this->name_full,
            'company' => $this->company,
            'description' => $this->description,
        ];

        if (!empty($this->menu_full) ||  !empty($this->company)) {
            $idcreator = CreatorController::SaveCreator($dados);
            $auts = Creator::find($idcreator);
            $this->autor = ['id'=> $auts->id, 'title' => $auts->name_full];
        }

        $this->name_full = "";
        $this->company = "";
        $this->description = "";

        return;

    }

    public function render()
    {
        return view('livewire.article-edit');
    }
}
