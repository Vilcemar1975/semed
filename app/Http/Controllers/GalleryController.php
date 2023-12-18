<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\School;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\ImageController;

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


    public function store(Request $request, $uid)
    {
        // Validação dos dados
        $request->validate([
            'photos.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Processamento das imagens e textos
        $images = $request->file('photos');
        $uidgaleria = [];
        $escola = School::where('uid', $uid)->first();
        if($escola == null){
            return redirect()->route('editarescola', ['uid' => $uid])->with('errors', "O número de imagens e locais não coincide.");
        }

        // Para cada imagem, faça o upload e armazene os dados
        foreach ($images as $key => $image) {
            $uidimg = Str::uuid();

            $configImg = [
                'logo' => false,
                'inep' => $request->inep,
            ];

            Image::create([
                'uid' => $uidimg,
                'id_user' => Auth::id(),
                'id_group' => $escola->id_group,
                'uid_from_who' => $escola->uid,
                'id_author' => $escola->id,
                'unit' => $escola->unit,
                'title' => $escola->name,
                'category' => $escola->category,
                'classification' => "02",
                'type' => 2,
                'description' => "",
                'source' => "",
                'trash' => false,
                'config' => $configImg,
            ]);

            //salvar imagem
            if ($escola->unit == "umei") {
                $url = 'escolas/umei/'.$escola->inep;
            }else{
                $url = 'escolas/umef/'.$escola->inep;
            }

            $imageName = $image->hashName();
            $path = $image->storeAs($url, $imageName);

            $uidgaleria[] = ['uid' => $uidimg, 'name' => $imageName, 'url' => $path];

        }


        $uidgal = Str::uuid();

        $galeria = Gallery::create([
            'uid' => $uidgal,
            'id_user' => $escola->id_user,
            'id_group' => $escola->group,
            'uid_from_who' => $escola->uid,
            'imagens' => $uidgaleria,
            'public' => true,
        ]);

        if($galeria){
            return redirect()->route('editarescola', ['uid' => $uid])->with('success', "Salvo com sucesso!");
        }else{
            return redirect()->route('editarescola', ['uid' => $uid])->with('errors', "O número de imagens e locais não coincide.");

        }

        return response()->json(['message' => 'Imagens e textos foram salvos com sucesso.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        //
    }
}
