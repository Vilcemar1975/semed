<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Models\Article;
use App\Models\Creator;
use App\Models\Image;
use App\Http\Controllers\CoreController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\TaskpublicController;
use App\Models\Topic;
use App\Models\Taskpublic;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class ArticleController extends Controller
{
    public static function ArticleList(){

        $articlesList = Article::select('articles.id', 'articles.uid', 'articles.title', 'articles.status', 'articles.trash')
            ->withCount('topics') // Isso adiciona o campo 'topics_count' automaticamente
            ->where('articles.trash', false)
            ->groupBy('articles.id', 'articles.uid', 'articles.title', 'articles.status', 'articles.trash')
            ->paginate(15);

        return $articlesList;
    }

    public static function CreateArticle(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'category' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('dash/artigo')
                        ->withErrors($validator)
                        ->withInput();
        }

        $nickname = Str::slug(Str::lower($request->title), '-');

        $config = CoreController::config(false, false, false, false, false, false, false, false, false, false);

        $status = CoreController::status("no_public",  "", "", "", "", false);

        try {
            $artigo = Article::create(['uid' => Str::uuid(), 'id_user' => auth()->id(), 'title' => $request->title, 'nickname' => $nickname, 'category' => $request->category, 'config' => $config, 'status' => $status]);
        } catch (ModelNotFoundException $th) {
            return redirect()->back()->with('danger', $th);
        } catch (QueryException $e) {
            return redirect()->back()->with('danger', $e);
        }

        return $artigo;

    }


    public function ArticleSave(Request $request, $uid_artigo){

        $artigo = Article::where('uid', $uid_artigo)->first();

        $active = $request->public == "public" ? true: false;
        if ($artigo->category != $request->category) {
            $topics = Topic::where('uid_from_who', $uid_artigo)->get();
            foreach($topics as $topic){
                TopicsController::updateCategoryImage($topic->uid, $request->category);
            }
        }

        $sw_at = isset($request->show_author) ? true: false;
        $sw_dp = isset($request->show_day_public) ? true: false;
        $sw_da = isset($request->show_day_alteration) ? true: false;
        $sw_dc = isset($request->show_description) ? true: false;
        $sw_ur = isset($request->show_url) ? true: false;
        $sw_dw = isset($request->show_download) ? true: false;
        $sw_ap = isset($request->show_author_photo) ? true: false;
        $sw_av = isset($request->show_author_video) ? true: false;
        $sw_pr = isset($request->show_print) ? true: false;
        $sw_sh = isset($request->show_share) ? true: false;

        $config = CoreController::config($sw_at, $sw_dp, $sw_da, $sw_dc, $sw_ur, $sw_dw, $sw_ap, $sw_av, $sw_pr, $sw_sh);

        $status = CoreController::status(
            $request->public,
            $request->date_start,
            $request->date_end,
            $request->hour_start,
            $request->hour_end,
            $active,
        );


        if ($request->public == "public_day") {

            TaskpublicController::TaskSave($uid_artigo, $request->date_start, $request->hour_start, $request->date_end, $request->hour_end);

        }

        $result = DB::table('articles')->where('uid', $uid_artigo)->update([
            'category' =>  $request->category,
            'title' =>  $request->title,
            'subtitle' =>  $request->subtitle,
            'nickname' =>  Str::slug(Str::lower($request->title), '-'),
            'creators' =>  $request->author,
            'status' =>  $status,
            'config' =>  $config,
            'highlight' => isset($request->detach) ? true: false,
            'special_position' =>  $request->position_spasion,
            'acesso' =>  $request->acess,
        ]);

        if ($result) {
            Session::flash('success', 'Alterado com sucesso!!!');
        }else{
            Session::flash('danger', 'Erro ao alterar arquivo!');
        }



       /*  $artigo = Article::where('id', $id)->first();
        $ativar = 'dashartigo';
        $dados = CoreController::conjuntoVariaveisDashboard(); */

        //return view('backoffice.dashartigoadd', compact(['dados', 'ativar', 'artigo']));
        return redirect()->route('articleedit', ['id' => $uid_artigo]);

    }

    public function ArticleEdit($uid_article){
        $user = Auth::user();
        $artigo = Article::where('uid', $uid_article)->first();

        if ($artigo == null) {
            return redirect()->route('dashartigo')->with('danger', 'Erro Não Consegui Encontrar o Arquivo');
        }

        $artigoCriador = self::GetCreator($artigo->creators);

        $ativar = 'dashartigo';
        $dados = CoreController::conjuntoVariaveisDashboard();
        $criadores = $artigoCriador[1];
        $autor = $artigoCriador[0];
        $categoria = [];
        $position_esp = [];
        $acess = [];
        $topicos = Topic::where('uid_from_who', $uid_article)->with('image')->paginate(25);
        $status = $artigo->status;
        $configs = $artigo->config;

        //Buscar categoria
        foreach( $dados['listsite'] as $item){
            if ($item['id'] == $artigo->category) {
                $categoria = ['id' => $item['id'], 'title' => $item['title'],];
            }
        }

        //Buscar Posição
        foreach( $dados['position_spacial'] as $item){
            if ($item['id'] == $artigo->special_position) {
                $position_esp = ['id' => $item['id'], 'title' => $item['title'],];
            }
        }

        //Buscar Acesso para exposição
        foreach( $dados['acess'] as $item){
            if ($item['id'] == $artigo->acesso) {
                $acess = ['id' => $item['id'], 'title' => $item['title'],];
            }
        }

        return view('backoffice.dashartigoadd', compact(['dados', 'ativar', 'artigo', 'criadores', 'autor', 'categoria', 'topicos', 'status', 'configs', 'position_esp', 'acess']));
    }

    public static function GetCreator($idcreato){

        $user = Auth::user();
        $creators = Creator::get();
        $autor = ['id' => $user->id, 'title' => $user->name.' '.$user->lastname,];
        $criadores = [];

        if (count($creators) > 0) {

            foreach($creators as $criador){


                array_push($criadores, [
                    'id' => $criador->id,
                    'title' => $criador->name_full,
                ]);

                if($criador->id == $idcreato){
                    $autor = ['id' => $criador->id, 'title' => $criador->name_full,];
                }
            }

        }

        return [$autor, $criadores];
    }

    public function ArticlePublic(Request $request) {

        /* $ativar = 'dashartigo';
        $dados = CoreController::conjuntoVariaveisDashboard(); */
        $active = $request->public_c == "public" ? true : false;

        $status = CoreController::status(
            $request->public_c,
            $request->date_start_c,
            $request->date_end_c,
            $request->hour_start_c,
            $request->hour_end_c,
            $active,
        );

        DB::table('articles')->where('uid', $request->status_uid_c)->update([
            'status' =>  $status,
        ]);

        if ($request->public_c == "public_day") {
            TaskpublicController::TaskSave($request->status_uid_c, $request->date_start_c, $request->hour_start_c, $request->date_end_c, $request->hour_end_c);
        }else{
            Taskpublic::where('uid_from_who', $request->status_uid_c)->delete();
        }

        return redirect()->route('dashartigo');
    }


    function CriarCriador(Request $request, $uid_artigo){

        $result = CreatorController::SaveCriar($request);

        return redirect()->route('articleedit', ['id' => $uid_artigo])->with('success', $result[1]);
    }

    public function DuplicateAticle(Request $request){

        $validator = Validator::make($request->all(), [
            'title_duplicate' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('dash/artigo')
                        ->withErrors($validator)
                        ->withInput();
        }

        //Duplicando Artigo
        $artigoAtual = Article::where('uid',$request->uid_article)->first();

        if ($artigoAtual != null) {
            $user = Auth::user();
            $uuid = Str::uuid();
            $novoTitle = $request->title_duplicate;

            $config = CoreController::config(
                $artigoAtual->config['show_author'],
                $artigoAtual->config['show_day_public'],
                $artigoAtual->config['show_day_alteration'],
                $artigoAtual->config['show_description'],
                $artigoAtual->config['show_url'],
                $artigoAtual->config['show_download'],
                $artigoAtual->config['show_author_photo'],
                $artigoAtual->config['show_author_video'],
                $artigoAtual->config['show_print'],
                $artigoAtual->config['show_share']
            );

            $status = CoreController::status(
                $artigoAtual->status['public'],
                $artigoAtual->status['date_start'],
                $artigoAtual->status['date_end'],
                $artigoAtual->status['hour_start'],
                $artigoAtual->status['hour_end'],
                $artigoAtual->status['active']
            );

            Article::create([
                'uid'=> $uuid,
                'uid_from_who' => $user->uid,
                'id_user' => $user->id,
                'id_group' => $artigoAtual->id_group,
                'creators' => $artigoAtual->creators,
                'category' => $artigoAtual->category,
                'title' => $novoTitle,
                'subtitle' => $artigoAtual->subtitle,
                'nickname' => $artigoAtual->nickname,
                'status' => $status,
                'config' => $config,
                'highlight' => $artigoAtual->highlight,
                'special_position' => $artigoAtual->special_position,
                'acesso' => $artigoAtual->acesso,
            ]);

            if ($request->has('diplicar_topicos')) {
                //Duplicando Topicos
                $topicosAtuais = Topic::where('uid_from_who', $request->uid_article)->with('image')->get();

                //verificar se a variavel $topicosAtuais está vazia
                foreach ($topicosAtuais as $value) {

                    $uidTopico = Str::uuid();
                    Topic::create([
                        'uid' => $uidTopico,
                        'uid_from_who' => $uuid,
                        'id_articles' => $value->id_articles,
                        'position' => $value->position,
                        'title' => $value->title,
                        'nickname' => $value->nickname,
                        'text' => $value->text,
                        'public' => $value->public,
                    ]);

                    //Duplicando Imagem
                    $img = $value->image;
                    Image::create([
                        'uid' => Str::uuid(),
                        'uid_from_who' => $uidTopico,
                        'id_user' => $user->id,
                        'id_group' => $img->id_group,
                        'id_author' => $img->id_author,
                        'title' => $img->title,
                        'nickname' => $img->nickname,
                        'category' => $img->category,
                        'classification' => $img->classification,
                        'url' => $img->url,
                        'type' => $img->type,
                        'description' => $img->description,
                        'source' => $img->source,
                        'config' => $img->config,
                    ]);

                    if($img->url != null){
                        $nameImg = explode('/', $img->url)[1];
                        $nameNovo = 'imagens/'.explode('.', $nameImg)[0].'_copy'.'.'.explode('.', $nameImg)[1];
                        Storage::copy($img->url, $nameNovo);
                    }


                }
            }



        }

        return redirect()->route('dashartigo')->with('success', "Item Dublicado: ".$request->title_duplicate);
    }

    public function ArticleTrash($uid){

        $result = DB::table('articles')->where('uid', $uid)->update(['trash' => true ]);

        if ($result) {
            return redirect()->back()->with('warinng', "Artigo enviada para lixeira");
        }else{
            return redirect()->back()->with('danger', "Erro ao envia artigo para lixeira");
        }

    }

}
