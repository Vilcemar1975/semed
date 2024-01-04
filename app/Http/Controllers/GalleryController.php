<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\School;
use App\Models\Image;
use App\Models\Creator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CreatorController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;



class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $galerias = Gallery::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function GalerySaveSchoolImg(Request $request, $uid)
    {
        /* *
         * Criando a galeria e salvando as imagens
         */

        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'photos.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            Session::flash('errors', "Selecione uma imagem por favor!");
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();

        }

        // Processamento das imagens e textos
        $images = $request->file('photos');
        $uidgaleria = [];
        $uidgal = null;
        $escola = School::where('uid', $uid)->first();
        if($escola == null){
            return redirect()->route('editarescola', ['uid' => $uid])->with('errors', "O número de imagens e locais não coincide.");
        }

        //Verifica se tem imagems
        if($request->file('photos') == null){
            return redirect()->route('editarescola', ['uid' =>  $escola->uid])->with('errors', "Selecione uma imagem.");
        }

        //Pesquisando para saber se tem galeria
        $galeria = Gallery::where('uid_from_who', $escola->uid)->first();
        if ($galeria != null) {
            $contando = count($galeria->imagens) + count($images);
            if ( $contando > 10) {
                return redirect()->route('editarescola', ['uid' => $uid])->with('errors', "Quantidade de Imagaem acima do esperado. Permimitido somente 10 imagens");
            }

        }

        //Cria a galeria se não tiver, e atualiza quando tiver.
        if ($galeria == null){
            $uidgal = Str::uuid();
            $galeriadb = Gallery::create([
                'uid' => $uidgal,
                'id_user' => $escola->id_user,
                'id_group' => $escola->group,
                'uid_from_who' => $escola->uid,
                'imagens' => $uidgaleria,
                'public' => true,
            ]);
            $uidgal =  $uidgal;
        }else{

            $galeriadb = Gallery::where('uid', $galeria->uid)->update([
                'id_user' => $escola->id_user,
                'id_group' => $escola->group,
                'uid_from_who' => $escola->uid,
            ]);

            $uidgal = $galeria->uid;

        }

        if($galeriadb){

            // Para cada imagem, faça o upload e armazene os dados
            foreach ($images as $key => $image) {

                $uidimg = Str::uuid();
                $userId = Auth::user();

                $configImg = [
                    'logo' => false,
                    'inep' => $escola->inep,
                ];

                //salvar imagem
                if ($escola->unit == "umei") {
                    $url = 'escolas/umei/'.$escola->inep;
                }else{
                    $url = 'escolas/umef/'.$escola->inep;
                }

                $imageName = $image->hashName();
                $path = $image->storeAs($url, $imageName);
                $category = "escola > galeria";

                $img = Image::create([
                    'uid' => $uidimg,
                    'id_user' => $userId->id,
                    'id_group' => $escola->id_group,
                    'uid_from_who' => $uidgal,
                    'id_author' => $userId->id,
                    'unit' => $escola->unit,
                    'title' => $escola->name,
                    'nickname' => $imageName,
                    'category' => $category,
                    'classification' => "01",
                    'url' => $path,
                    'type' => 1,
                    'description' => "",
                    'source' => "",
                    'trash' => false,
                    'config' => $configImg,
                ]);

                $uidgaleria[] = ['uid' => $uidimg, 'name' => $imageName, 'url' => $path];

            }

            $imagens = $galeria->imagens;
            for ($i=0; $i < count($imagens); $i++) {
                $imagensDB[] = $imagens[$i];
            }

            for ($f=0; $f < count($uidgaleria); $f++) {
                $imagensDB[] = $uidgaleria[$f];
            }


            Gallery::where('uid', $uidgal)->update(['imagens' => $imagensDB]);

            return redirect()->route('editarescola', ['uid' => $uid])->with('success', "Salvo com sucesso!");
        }else{
            return redirect()->route('editarescola', ['uid' => $uid])->with('errors', "O número de imagens e locais não coincide.");

        }

        return response()->json(['message' => 'Imagens e textos foram salvos com sucesso.']);
    }

    public function SaveGalerieAPI($dados){
        dd($dados);
        return response()->json(['message' => 'Imagens e textos foram salvos com sucesso.']);
    }


    public function DelImg($uidImg){

        $imgagemDb = Image::where('uid', $uidImg)->first();

        if ($imgagemDb == null) {
           return redirect()->back();
        }

        $galeria = Gallery::where('uid', $imgagemDb->uid_from_who)->first();

        $imgGals = $galeria->imagens;

        if ($imgGals !== null) {

            foreach ($imgGals as $key => $value) {
                if ($value['uid'] === $uidImg) {
                    Storage::delete($value['url']); //Delentando a Imagem da Pasta
                    unset($imgGals[$key]);
                    Image::where('uid', $uidImg)->delete();
                }
            }

            Gallery::where('uid', $imgagemDb->uid_from_who)->update(['imagens' => $imgGals]); // Atualizando a galeria

        }

        return redirect()->back();
    }



}
