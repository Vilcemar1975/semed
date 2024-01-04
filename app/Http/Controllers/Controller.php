<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public static function SearchUserMatricual( Request $request){


        $query = $request->input('query');
        $users = User::where('matriculation', $query)->first();

        if ($users == null) {
            return response()->json([ 'flag'=> false, 'message' => 'Não Encontrado' ,'user' => null]);
        }

        return response()->json([ 'flag'=> true, 'message' => "Usuário encontrado" , 'user' => $users]);

    }
}
