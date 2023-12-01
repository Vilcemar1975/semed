<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{

    public static function ImageSave($dados, $idimg = null){

        if ($idimg == null) {

            $img = Image::create([
                'id_user' => Auth::id(),
                'id_group' => $dados['id_group'],
                'uid_from_who' => Str::uuid(),
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

            if ($dados['request'] != null) {
                $url = self::img($dados['request'], $dados['fieldImg'], 'imagens');

                DB::table('images')->where('id', $img->id)->update([
                    'nickname' => $url['nameFile'],
                    'url' => $url['path'],
                ]);
            }

            $result = $img->id;

        }else{


            $result = $idimg;

            DB::table('images')->where('id', $idimg)->update([
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

            if ($dados['request'] != null) {

                $url = self::img($dados['request'], $dados['fieldImg'], 'imagens', $idimg);
                DB::table('images')->where('id', $idimg)->update([
                    'nickname' => $url['nameFile'],
                    'url' => $url['path'],
                ]);

            }

        }

        return $result;
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
                $url = Image::find($idimg)->url;
                Storage::delete($url);
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

}
