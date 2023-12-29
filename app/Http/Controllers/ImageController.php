<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{

    public static function ImageSave($dados, $uidimg = null){

        if ($uidimg == null) {
            $uidimage = Str::uuid();
            Image::create([
                'uid' => $uidimage,
                'id_user' => Auth::id(),
                'id_group' => $dados['id_group'],
                'uid_from_who' => $dados['uid_from_who'],
                'id_author' => $dados['id_author'],
                'title' => $dados['title'],
                'category' => $dados['category'],
                'classification' => $dados['classification'],
                'type' => $dados['type'],
                'description' => $dados['description'],
                'source' => $dados['source'],
                'trash' => false,
                'config' => $dados['config'],
            ]);

            /* if ($dados['request'] != null) {
                $url = self::img($dados['request'], $dados['fieldImg'], 'imagens');

                DB::table('images')->where('id', $img->id)->update([
                    'nickname' => $url['nameFile'],
                    'url' => $url['path'],
                ]);
            } */

            $uidimg = $uidimage;

        }else{

            DB::table('images')->where('uid', $uidimg)->update([
                'id_group' => $dados['id_group'],
                'id_author' => $dados['id_author'],
                'title' => $dados['title'],
                'nickname' => $dados['nickname'],
                'category' => $dados['category'],
                'classification' => $dados['classification'],
                'type' => $dados['type'],
                'description' => $dados['description'],
                'source' => $dados['source'],
                'config' => $dados['config'],
            ]);

            /* if ($dados['request'] != null) {

                $url = self::img($dados['request'], $dados['fieldImg'], 'imagens', $idimg);
                DB::table('images')->where('uid', $idimg)->update([
                    'nickname' => $url['nameFile'],
                    'url' => $url['path'],
                ]);

            } */

        }

        $req = $dados['request'];
        $nomeDoCampo = $dados['fieldImg'];

        if ($req->hasFile($nomeDoCampo)) {
            $url = self::img($dados['request'], $nomeDoCampo, 'imagens', $uidimg);
            DB::table('images')->where('uid', $uidimg)->update([
                    'nickname' => $url['nameFile'],
                    'url' => $url['path'],
                ]);
        }

        return Image::where('uid', $uidimg)->first();
    }

    public static function ImageSaveSchool($dados, $uidimg){
    /**
     *  $dados: Todas as informações necessárias da imagem
     * $uidimg: Caso seja alteração o uidimg vem com o uid da imagem, padrão null
     */

        if ($uidimg == null || $uidimg == "") {
            $uidimage = Str::uuid();

            Image::create([
                'uid' => $uidimage,
                'id_user' => Auth::id(),
                'id_group' => $dados['id_group'],
                'uid_from_who' => $dados['uid_from_who'],
                'id_author' => $dados['id_author'],
                'unit' => $dados['unit'],
                'title' => $dados['title'],
                'category' => $dados['category'],
                'classification' => $dados['classification'],
                'type' => $dados['type'],
                'description' => $dados['description'],
                'source' => $dados['source'],
                'trash' => false,
                'config' => $dados['config'],
            ]);

            $uidimg = $uidimage;

        }else{

            DB::table('images')->where('uid', $uidimg)->update([
                'id_group' => $dados['id_group'],
                'id_author' => $dados['id_author'],
                'title' => $dados['title'],
                'nickname' => $dados['nickname'],
                'category' => $dados['category'],
                'classification' => $dados['classification'],
                'type' => $dados['type'],
                'description' => $dados['description'],
                'source' => $dados['source'],
                'config' => $dados['config'],
            ]);

        }

        $req = $dados['request'];
        $nomeDoCampo = $dados['fieldImg'];
        $pastaEscola = $dados['folderSchool'];

        if ($req->hasFile($nomeDoCampo)) {

            if ($dados['unit'] == 1) {
                $url = self::img($dados['request'], $nomeDoCampo, 'escolas/umei/'.$pastaEscola, $uidimg);
            }else{
                $url = self::img($dados['request'], $nomeDoCampo, 'escolas/umef/'.$pastaEscola, $uidimg);
            }

            DB::table('images')->where('uid', $uidimg)->update([
                    'nickname' => $url['nameFile'],
                    'url' => $url['path'],
                ]);
        }

        $imagem = Image::where('uid', $uidimg)->first();

        return $imagem;
    }


    public static function img(Request $request, $campo, $caminho, $idimg = null){
        /**
         * $campo: Nome do campo da imagem.
         * $caminho: Caminho que será salvo a imagem.
         * $nomeImagem: nome da imagem.
         * $idimg:  se o ID for diferente de null apaga imagem da pasta.
         *  */

        $request->validate([
            $campo => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile($campo)) {

            if ($idimg != null) {
                $imgDB = Image::find($idimg);
                if ($imgDB != null) {
                    Storage::delete($imgDB->url);
                }
            }

            $image = $request->file($campo);
            //$imageName = $image->hashName().'.'.$image->extension();
            $imageName = $image->hashName();
            $path = $image->storeAs($caminho, $imageName);

            $dados = ['nameFile'=> $imageName, 'path' => $path, 'type' => $image->extension()];

        }else{
            $dados = ['nameFile'=> "Imagem Padrão", 'path' => "storage/padrao/img.jpeg", 'type' => "svg"];
        }



        return $dados;

    }

    public static function searchImageByUid($uid) {
        $auth = Auth::user();

        $image = Image::where("uid", $uid)->first();
        if ($image == null) {
            return json_encode(['error' => 'Imagem não encontrada'], JSON_UNESCAPED_UNICODE);
        }

        $autor = User::where("uid", $image->id_author)->first();
        if ($autor != null) {
            $autor = ['uid' => $autor->uid,'id' =>  $autor->id, 'name' => $autor->name, 'lastname' =>  $autor->lastname];
        }else{
            $autor = ['uid' => $auth->uid, 'id' => $auth->id, 'name' => $auth->name, 'lastname' => $auth->lastname];
        }

        $tipo = ['id' => "" , 'title' => ""];
        foreach(CoreController::type() as $type){
            if ($type['id']==$image->type) {
                $tipo = $type;
            }
        }

        $class = ['id' => "" , 'title' => ""];
        foreach(CoreController::classification() as $type){
            if ($type['id']==$image->type) {
                $class = $type;
            }
        }

        $dados = [
            "image" => $image,
            "autor" => $autor,
            'type' => $tipo,
            'classification' => $class
        ];

        return json_encode($dados);
    }

    public static function saveImg(Request $request, $uid) {

        Image::where('uid', $request->uid_img)->update([
            'id_author' => $request->author,
            'title' => $request->title_img,
            'classification'    => $request->classification_img,
            'type'  => $request->category_img,
            'description'   => $request->description_img,
            'source'    => $request->source_img,
        ]);

        return redirect()->back()->with('success', 'Salvo como sucesso!');
    }


    public static function deleteImg($uid) {

        $imagem = Image::where('uid',$uid)->first();

        if ($imagem == null) {
           return redirect()->back();
        }

        // Deleta a imagem do servidor
        if ($imagem->nickname != null) {
            Storage::delete($imagem->nickname);
        }

        $imagem->delete();

        return redirect()->back();
    }

    public static function eraseImg($uid) {

        $imagem = Image::where('uid',$uid)->first();

        if ($imagem == null) {
           return redirect()->back();
        }

        // Deleta a imagem do servidor
        if ($imagem->nickname != null) {
            Storage::delete($imagem->nickname);
        }

        $imagem->delete();

        return response()->json(['message' => 'Excluido foram salvos com sucesso.']);;
    }




}
