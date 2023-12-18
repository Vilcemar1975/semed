<?php

namespace App\Http\Controllers;

use App\Models\Andress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class AndressController extends Controller
{
    public static function AndressSalvar(Request $request, $uidFromWho){

        $validator = Validator::make($request->all(), [
            'cep' => 'required|max:10',
            'street' => 'required',
            'district' => 'required',
            'city' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        //Verificar se a variavel $request->uidAndress

        $endereco = Andress::where('uid_from_who', $uidFromWho)->first();

        if ($endereco == null) {
            self::Andress($request, $uidFromWho);
        }else{
            self::AndressUpdate($request, $endereco->uid);
        }


        return redirect()->back();
    }

    public static function Andress(Request $request, $uidFromWho) {

        $user = Auth::user();
        $uuid = Str::uuid();

        $endereco = Andress::create([
            'uid' => $uuid,
            'uid_from_who' => $uidFromWho,
            'id_user' => $user->id,
            'id_group' => $request->id_group,
            'from_who' => $request->from_who,
            'cep' => preg_replace('/[^a-zA-Z0-9.\-]/', '', $request->cep),
            'street' => $request->street,
            'number' => $request->number,
            'complement' => $request->complement,
            'district' => $request->district,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'permission' => $request->permission,
            'status' => true,
            'ibge' => $request->ibge,
            'gia' => $request->gia,
            'ddd' => $request->ddd,
            'siafi' => $request->siafi,
        ]);

        if($endereco->exists()){
            session()->flash('success', 'Endereço cadastrado com sucesso!');
        }else{
            session()->flash('errors', 'Ocorreu um erro ao tentar cadastrar o endereço');
        }


        return $endereco;
    }

    public static function AndressUpdate(Request $request, $uidFromWho){

        $endereco = Andress::where('uid_from_who', $uidFromWho)->update([
            'id_group' => $request->id_group,
            'from_who' => $request->from_who,
            'cep' => preg_replace('/[^a-zA-Z0-9.\-]/', '', $request->cep),
            'street' => $request->street,
            'number' => $request->number,
            'complement' => $request->complement,
            'district' => $request->district,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'permission' => $request->permission,
            'status' => true,
            'ibge' => $request->ibge,
            'gia' => $request->gia,
            'ddd' => $request->ddd,
            'siafi' => $request->siafi,
        ]);

        if($endereco->exists()){
            session()->flash('success', 'Endereço cadastrado com sucesso!');
        }else{
            session()->flash('errors', 'Ocorreu um erro ao tentar cadastrar o endereço');
        }

        return $endereco;
    }

}
