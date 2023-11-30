<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Topic;
use App\Http\Controllers\ImageController;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class TopicsController extends Controller
{
    public function index()
    {
        $topics = Topic::all();
        return view('topics.index', compact('topics'));
    }

    public function create()
    {
        return view('topics.create');
    }

    public static function updateCategoryImage($id_topic, $categoria){
        Image::where('id_from_who', $id_topic)->update([
            'category' => $categoria,
        ]);
    }


    public function topicSave(Request $request, $id_articles)
    {

        $artigo = Article::find($id_articles);
        if ($request->position_txtimg == 5) {

            $titlemodel = $artigo->title;
            $position_txtimg = $request->position_txtimg;
            $text = $artigo->category;

        } else {

            $request->validate([
                'position_txtimg' => 'integer',
                'titlemodel' => 'required|string',
                'text' => 'required|string',
            ]);

            $titlemodel = $request->titlemodel;
            $position_txtimg = $request->position_txtimg;
            $text = $request->text;
        }



        $topico = Topic::create([
            'from_who' => $artigo->title,
            'id_articles' => $id_articles,
            'position' => $position_txtimg,
            'title' => $titlemodel,
            'nickname' => Str::slug(Str::lower($titlemodel), '-'),
            'text' => $text,
        ]);

        if ($request->hasFile('image')){

            $imgDados = [
                'id_group' => $request->id_group_topic,
                'id_from_who' => $topico->id,
                'id_author' => $request->author_topic,
                'title' => $titlemodel,
                'nickname' => Str::slug(Str::lower($titlemodel), '-'),
                'category' => $artigo->category,
                'type' => $request->typo_topic,
                'classification' => $request->classification,
                'description' => $request->textimg,
                'request' => $request,
                'source' => $request->textimg,
                'config' => json_encode(['id_article' => $id_articles ]),
                'fieldImg' => 'image', //Id do campo da imagem na view
            ];

            ImageController::ImageSave($imgDados);
        }



        return redirect()->route('articleedit', ['id' => $id_articles])->with('success', 'Tópico criado com sucesso!');
    }

    public function topicAlter(Request $request, $id_articles){

        $request->validate([
            'position_txtimg' => 'integer',
            'titlemodel_edit' => 'required|string',
            'text' => 'required|string',
        ]);

        Topic::where('id', $request->id_topic)->update([
            'position' => $request->position_txtimg,
            'title' => $request->titlemodel_edit,
            'nickname' => Str::slug(Str::lower($request->titlemodel), '-'),
            'text' => $request->text,
        ]);

        if ($request->hasFile('image_edit')){

            $configJson = json_encode([
                'id_article' => $id_articles
            ]);

            $imgDados = [
                'id_group' => $request->id_group_topic,
                'id_from_who' => $request->id_topic,
                'id_author' => $request->author_topic_edit,
                'title' => $request->titlemodel_edit,
                'nickname' => Str::slug(Str::lower($request->titlemodel_edit), '-'),
                'type' => $request->typo_topic,
                'classification' => $request->classification_edit,
                'category' =>  $request->id_category_topic,
                'description' => $request->textimg_edit,
                'request' => $request,
                'source' => $request->textimg_edit,
                'config' => $configJson,
                'fieldImg' => 'image_edit', //Id do campo da imagem na view
            ];

            ImageController::ImageSave($imgDados, $request->id_topic_img);
        }

        return redirect()->route('articleedit', ['id' => $id_articles])->with('success', 'Tópico alterado com sucesso!');
    }

    public function topicPublic($id){

        $topic = Topic::find($id);

        $pb = $topic->public ? false: true;

        $topic->public = $pb;

        $topic->save();

        $id_art = $topic->id_articles;

        return redirect()->route('articleedit', ['id' => $id_art])->with('danger', "tópico excluído!");
    }


    public function topicErase($id){

        $topico = Topic::find($id);
        $img = Image::where('id_from_who', $id)->first();

        if ($img != null) {

            if ($img->nickname != null && $img->nickname != 'Imagem Padrão') {
                Storage::delete($img->url);
            }

            $img->delete();
        }

        $id_art = $topico->id_articles;

        $topico->delete();


        return redirect()->route('articleedit', ['id' => $id_art])->with('danger', "tópico excluído!");
    }



}
