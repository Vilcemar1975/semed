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

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class ArticleController extends Controller
{
    public static function ArticleList(){

            $articlesList = Article::where('trash', false)->all();

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
            $artigo = Article::create(['id_user' => auth()->id(),'title' => $request->title, 'nickname' => $nickname, 'category' => $request->category, 'config' => $config, 'status' => $status]);
        } catch (ModelNotFoundException $th) {
            return redirect()->back()->with('danger', $th);
        } catch (QueryException $e) {
            return redirect()->back()->with('danger', $e);
        }

    }


    public function ArticleSave(Request $request, $id_artigo){

        $artigo = Article::where('id', $id_artigo)->first();
        $active = $request->public == "public" ? true: false;

        if ($artigo->category != $request->category) {
            $topics = Topic::where('id_articles', $id_artigo)->get();
            foreach($topics as $topic){
                TopicsController::updateCategoryImage($topic->id, $request->category);
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

            TaskpublicController::TaskSave($id_artigo, $request->date_start, $request->hour_start, $request->date_end, $request->hour_end);

        }

        $result = DB::table('articles')->where('id', $id_artigo)->update([
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
        return redirect()->route('articleedit', ['id' => $id_artigo]);

    }

    public function ArticleEdit($id){
        $user = Auth::user();
        $artigo = Article::where('id', $id)->first();
        $ativar = 'dashartigo';
        $dados = CoreController::conjuntoVariaveisDashboard();
        $criadores = self::GetCreator($artigo->creators)[1];
        $autor = self::GetCreator($artigo->creators)[0];
        $categoria = [];
        $position_esp = [];
        $acess = [];
        $topicos = Topic::with('image')->where('id_articles', $id)->paginate();
        //dd($topicos);
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

                if($criador->id_user == $idcreato){
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

        DB::table('articles')->where('id', $request->status_id_c)->update([
            'status' =>  $status,
        ]);

        if ($request->public_c == "public_day") {
            TaskpublicController::TaskSave($request->status_id_c, $request->date_start_c, $request->hour_start_c, $request->date_end_c, $request->hour_end_c);
        }else{
            Taskpublic::where('id_articles', $request->status_id_c)->delete();
        }

        //return view('backoffice.dashartigo', compact(['dados', 'ativar']));
        return redirect()->route('dashartigo');
    }


    function CriarCriador(Request $request, $id_artigo){

        $result = CreatorController::SaveCriar($request);

        return redirect()->route('articleedit', ['id' => $id_artigo])->with('success', $result[1]);
    }

    public function ArticleTrash($id){

        $result = DB::table('articles')->where('id', $id)->update(['trash' => true ]);

        if ($result) {
            return redirect()->back()->with('warinng', "Artigo enviada para lixeira");
        }else{
            return redirect()->back()->with('danger', "Erro ao envia artigo para lixeira");
        }

    }

}
