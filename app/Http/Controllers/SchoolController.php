<?php

namespace App\Http\Controllers;

use App\Models\Andress;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\Creator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CreatorController;


class SchoolController extends Controller
{
    public static function ListSchool(){
        $school = School::where('trash', false)->with('image')->paginate(15);
        return $school;
    }

    public function EditarEscola($uid){

        $dados = CoreController::conjuntoVariaveisDashboard();
        $escola = School::where('uid', $uid)->with('image')->first();
        $status = $escola->status;
        $configs = $escola->config;
        $unidade = ['id' => $escola->unit, 'title' => $escola->unit = 1 ? 'umei' : 'umef'];
        $position_esp = [];
        $acess = [];
        $regioes = CoreController::regiao();
        $regiao = [];

        foreach ($regioes as $item){
            if($item['id'] == $escola->region) {
                $regiao = $item;
            }
        }

        //Buscar Diretora
        if($escola->direction['uid'] == null){
            $direcao =  ["registration" => "", "name" =>  ""];
        }else{
            $direcao = ["registration" => $escola->direction['registration'], "name" =>  $escola->direction['name_full']];
        }

        //Buscar Rede Social
        $telefone = $escola->phones;
        if ($telefone != null) {
            //
        }


        //Buscar Posição
        foreach( $dados['position_spacial'] as $item){
            if ($item['id'] == $escola->special_position) {
                $position_esp = ['id' => $item['id'], 'title' => $item['title']];
            }
        }

        $logoImg = Image::where('uid_from_who', $uid)->where('logo', true)->first();

        if ($logoImg != null) {
            $logo = ['uid' => $logoImg->uid, 'url' => $logoImg->url ] ?? ['uid' => null , 'url' => "storage/padrao/img.jpeg" ] ; // Se a url estivar vazio
        }else{
            $logo = ['uid' => null , 'url' => "storage/padrao/img.jpeg" ];
        }

        //Buscar Acesso para exposição
        foreach( $dados['acess'] as $item){
            if ($item['id'] == $escola->acesso) {
                $acess = ['id' => $item['id'], 'title' => $item['title']];
            }
        }

        //Buscar Localidade
        $local = ['id' => 1, 'title' => "urbano"];
        $localidades = [
            ['id' => 1, 'title' => "urbano"],
            ['id' => 2, 'title' => "rural"],

        ];
        foreach( $localidades as $item){
            if ($item['title'] == $escola->type) {
                $local = ['id' => $item['id'], 'title' => $item['title']];
            }
        }

        //Busca endereço
        $andress = Andress::where('uid_from_who', $escola->uid)->first();

        //Buscar galeria
        $galleries = Gallery::where('uid_from_who', $escola->uid)->first();

        //Buscar Criadores de imagems
        $criador = CreatorController::GetCreator($escola->id_user);
        $autor = $criador[0];
        $criadores = $criador[1];

        $galleriesCount = 0;
        if($galleries != null){ $galleriesCount = count($galleries->imagens); };

        $ativar = 'dashescola';
        $dados = CoreController::conjuntoVariaveisDashboard();

        return view('backoffice.dashescolasadd', compact(['dados', 'ativar', 'escola', 'unidade', 'regiao', 'status', 'configs','position_esp','acess', 'direcao', 'logo', 'andress', 'localidades', 'local', 'galleries', 'galleriesCount', 'autor', 'criadores']));

    }

    public static function CreateSchool(Request $request){

        $user = Auth::user();
        $uuid = Str::uuid();

        $validator = Validator::make($request->all(), [
            'inep' => 'required|unique:schools|max:10',
            'name' => 'required|string|max:255',
            'region' => 'required',
            'unit' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('dash/escola')
                        ->withErrors($validator)
                        ->withInput();
        }

        $config = CoreController::config(false, false, false, false, false, false, false, false, false, false);
        $status = CoreController::status("no_public",  "", "", "", "", false);
        $diretor = CoreController::direction(null,null,null);

        $phones = [
            CoreController::phones(null, false, [['id' => 1, 'active' => false], ['id' => 7, 'active' => false]]),
            CoreController::phones(null, false, [['id' => 1, 'active' => false], ['id' => 7, 'active' => false]])
        ];

        $emails = [
            CoreController::emails(null, null, null),
            CoreController::emails(null, null, null)
        ];

        $unit = $request->unit == "1" ? 'umei': 'umef';

        try {
            $school = School::create([
                'uid'       => $uuid,
                'id_user'   => $user->id,
                'region'    => $request->region,
                'inep'      => $request->inep,
                'date_open' => $request->date_open,
                'name'      => $request->name,
                'unit'      => $unit,
                'nickname'  => $request->name,
                'phones'    => $phones,
                'emails'    => $emails,
                'direction' => $diretor,
                'config'    => $config,
                'status'    => $status,
            ]);

            //Salvar imagem
            if ($school->exists()) {



                $configImg = [
                    'logo' => true,
                    'inep' => $request->inep,
                ];

                $imgDados = [
                    'uid_from_who' =>  $uuid,
                    'id_author' => $user->id,
                    'id_group' => $request->unit,
                    'title' => $request->name,
                    'nickname' => Str::slug(Str::lower($request->name), '-'),
                    'unit' => $request->unit,
                    'category' => "escola",
                    'type' => 2,
                    'classification' => "01",
                    'description' => "Logo ".$request->name,
                    'request' => $request,
                    'source' => "Escola",
                    'config' => $configImg,
                    'fieldImg' => 'image', //Id do campo da imagem na view
                    'folderSchool' =>  $request->inep,
                    'logo' => true,
                ];

                ImageController::ImageSaveSchool($imgDados, null);

                //Session::flash('success', "Criado com sucesso!");

                return redirect()->route('editarescola', ['uid' => $school->uid])->with('success', "Salvo com sucesso!");

            }else{

                return redirect()->route('dashescola')->withErrors(['errors' => 'Erro ao Cadastrar Escola']);

            }

        } catch (\Throwable $th) {

            return redirect()->route('dashescola')->withErrors(['errors' =>  $th->getMessage()]);
        }


    }

    public  function EditSchool(Request $request, $uid){

        //Atualizar a tabela schools os dados
        $escola = School::where('uid', $uid)->first();

        if ($escola == null) {
            return redirect()->back();
        }

        $social_media = CoreController::socialMedia($request->netSocial_twitter, $request->netSocial_linkedin, $request->netSocial_instagram, $request->netSocial_facebook, $request->netSocial_youtube);

        //Trantando campo diretor
        $diretorRequest = $request->diretor;
        $diretorMatricula = $request->diretor_matricula;
        $diretor = CoreController::direction(null, null, null);
        if( $diretorRequest != null){
            $dorcente = User::where('uid', $request->id_diretor)->first();
            if($dorcente != null){
                $diretor = CoreController::direction($request->id_diretor, $diretorMatricula, $diretorRequest);
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

        $active = $request->public == "public"? true: false;

        $status = CoreController::status(
            $request->public,
            $request->date_start,
            $request->date_end,
            $request->hour_start,
            $request->hour_end,
            $active,
        );

        if ($request->public == "public_day") {

            TaskpublicController::TaskSave($uid, $request->date_start, $request->hour_start, $request->date_end, $request->hour_end);

        }

        //Alterando telefone e e-mail
        $telephone = $request->telephone;
        $phone = $request->phone;
        $telephone_whatsapp = isset($request->telephone_whatsapp) ? true: false;
        $telephone_telegran = isset($request->telephone_telegran) ? true: false;
        $phone_whatsapp = isset($request->phone_whatsapp) ? true: false;
        $phone_telegran = isset($request->phone_telegran) ? true: false;

        $testicon_tel = $telephone_whatsapp || $telephone_telegran ? true: false;
        $testicon_phone = $phone_whatsapp || $phone_telegran ? true: false;


        $phones = [
            CoreController::phones($telephone, $testicon_tel, [['id' => 1, 'active' => $telephone_whatsapp], ['id' => 7, 'active' => $telephone_telegran]]),
            CoreController::phones($phone, $testicon_phone, [['id' => 1, 'active' => $phone_whatsapp], ['id' => 7, 'active' => $phone_telegran]])
        ];

        $emails = [
            CoreController::emails("google", $request->email_google, "fa-brands fa-google"),
            CoreController::emails("microsoft", $request->email_microsoft, "fa-brands fa-windows")
        ];

        $estrutura = isset($request->estrutura_hidden) ? $request->estrutura_hidden: null;

        // Alterando o registro
        School::where('uid', $uid)->update([
            'region'    => $request->regiao,
            'inep'  => $request->inep,
            'date_open'     => $request->date_open,
            'name'  => $request->name,
            'nickname'  => $request->nickname,
            'phones'    => $phones,
            'emails'    => $emails,
            'type'  => $request->type == 1 ? "urbano": "rural",
            'level'     => $request->level,
            'description'   => $request->text,
            'direction'     => $diretor,
            'structure'     => $estrutura,
            'config'    => $config,
            'status'    => $status,
            'social_media' => $social_media,
            'highlight'     => isset($request->detach) ? true: false,
            'special_position'  => $request->position_spasion,
            'acesso'    => $request->acess,

        ]);


        //Alterando a Imagem
        if ($request->hasFile('image')){

            $configImg = [
                'logo' => true,
                'inep' => $request->inep,
            ];

            $imgDados = [
                'uid_from_who' =>  $escola->uid,
                'id_author' => $escola->id,
                'id_group' => $request->unit,
                'title' => $request->name,
                'nickname' => Str::slug(Str::lower($request->name), '-'),
                'unit' => $request->unit,
                'category' => "escola",
                'type' => 2,
                'classification' => "01",
                'description' => "Logo |".$request->name,
                'request' => $request,
                'source' => "Escola",
                'config' => $configImg,
                'fieldImg' => 'image', //Id do campo da imagem na view
                'folderSchool' =>  $request->inep,
            ];

            ImageController::ImageSaveSchool($imgDados, $uid);

        }

        Session::flash('success', "Alterado com sucesso!");

        return redirect()->route('editarescola', ['uid' => $uid])->with('success', "Alterado com sucesso!");

        return;
    }


    //Pesquisa de nome de Diretor
    public function SearchUsers(Request $request){

        $query = $request->input('query');

        $users = User::where('matriculation', 'like', "%$query%")
        ->orWhere('name', 'like', "%$query%")
        ->orWhere('lastname', 'like', "%$query%")
        ->get();

        return response()->json(($users));

    }

    public function ExcluirEscola($uid){

        School::where('uid', $uid)->update(['trash' => true,]);

        return redirect()->route('dashescola');

    }

}
