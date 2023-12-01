<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\School;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;


class SchoolController extends Controller
{
    public static function ListSchool(){
        $school = School::where('trash', false)->paginate(15);
        return $school;
    }

    public static function CreateSchool(Request $request){

        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'inep' => 'required|unique:schools|max:10',
            'name' => 'required|string|max:255',
            'region' => 'required|max:1',
        ]);

        if ($validator->fails()) {
            return redirect('dash/escola')
                        ->withErrors($validator)
                        ->withInput();
        }

        $config = CoreController::config(false, false, false, false, false, false, false, false, false, false);

        $status = CoreController::status("no_public",  "", "", "", "", false);

        $result = School::create([
            "id_user" => $user->id,
            "inep" => $request->inep,
            "name" => $request->name,
            "region" => $request->region,
            "status" => $status,
            "config" => $config,

        ]);
        $id_escola = $result->id;
        dd($id_escola);
        if ($result) {
            if ($request->hasFile('image')){

                $imgDados = [
                    'id_from_who' =>  $result->id,
                    'id_author' => $user->id,
                    'id_group' => "",
                    'title' => $request->name,
                    'nickname' => Str::slug(Str::lower($request->name), '-'),
                    'category' => "escola",
                    'type' => "02",
                    'classification' => "01",
                    'description' => "",
                    'request' => $request,
                    'source' => "",
                    'config' => null,
                    'fieldImg' => 'image', //Id do campo da imagem na view
                ];

                ImageController::ImageSave($imgDados);

                Session::flash('danger', "Criado com sucesso!");
            }
        }else{
            Session::flash('danger', "Erro ao criar escola.");
        }

        return $id_escola;
    }
}
