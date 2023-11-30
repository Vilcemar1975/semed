<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Creator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreatorController extends Controller
{
    public static function ShowCreador(){

        return $creatores = Creator::get();
    }

    public static function SaveCreator($dados, $id = null){

        if ($id == null) {

            $creator = Creator::create([
                'id_user' => $dados['id_user'],
                'name_full' => $dados['name_full'],
                'company' => $dados['company'],
                'description' => $dados['description'],
            ]);

        }else{
            $creator = DB::table('users')
                ->where('id', $id)
                ->update([
                    'name_full' => $dados['name_full'],
                    'company' => $dados['company'],
                    'description' => $dados['description'],
                ]);
        }

        return $creator->id;
    }

    public static function SaveCriar(Request $request){

        $creator = new Creator();

        if ($request->name_full != null || $request->company != null) {

            $creator = Creator::create([
                'id_user' => Auth::id(),
                'name_full' => $request->name_full,
                'company' => $request->company,
                'description' => $request->description,
            ]);
            $messagem = "Criado com sucesso!";
        }else{
            $messagem = "Erro ao salvar!";
        }

        return [$creator->id, $messagem];
    }


}

/* $affected =  */
