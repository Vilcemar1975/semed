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

    public static function updateCategoryImage($uid_topic, $categoria){
        Image::where('uid', $uid_topic)->update([
            'category' => $categoria,
        ]);
    }


    public function topicSave(Request $request, $uid_articles)
    {
        $topic_uid = Str::uuid();
        $artigo = Article::where('uid', $uid_articles)->first();
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
            'uid' => $topic_uid,
            'uid_from_who' => $artigo->uid,
            'id_articles' => $artigo->id,
            'position' => $position_txtimg,
            'title' => $titlemodel,
            'nickname' => Str::slug(Str::lower($titlemodel), '-'),
            'text' => $text,
        ]);


        $imgDados = [
            'id_group' => $request->id_group_topic,
            'uid_from_who' => $topic_uid,
            'id_author' => $request->author_topic,
            'title' => $titlemodel,
            'nickname' => Str::slug(Str::lower($titlemodel), '-'),
            'category' => $artigo->category,
            'type' => $request->typo_topic,
            'classification' => $request->classification,
            'description' => $request->textimg,
            'request' => $request,
            'source' => $request->textimg,
            'config' => json_encode(['article' => $artigo->uid ]),
            'fieldImg' => 'image', //Id do campo da imagem na view
        ];

        ImageController::ImageSave($imgDados);




        return redirect()->route('articleedit', ['id' => $uid_articles])->with('success', 'Tópico criado com sucesso!');
    }

    public function topicAlter(Request $request, $uid_articles){

        $request->validate([
            'position_txtimg' => 'integer',
            'titlemodel_edit' => 'required|string',
            'text' => 'required|string',
        ]);

        Topic::where('uid', $request->uid_topic)->update([
            'position' => $request->position_txtimg,
            'title' => $request->titlemodel_edit,
            'nickname' => Str::slug(Str::lower($request->titlemodel), '-'),
            'text' => $request->text,
        ]);

        $configJson = json_encode([
            'article' => $uid_articles
        ]);

        $imgDados = [
            'id_group' => $request->id_group_topic,
            'id_author' => $request->author_topic_edit,
            'uid_from_who' => $request->uid_topic,
            'title' => $request->titlemodel_edit,
            'nickname' => Str::slug(Str::lower($request->titlemodel_edit), '-'),
            'type' => $request->typo_topic_edit,
            'classification' => $request->classification_edit,
            'category' =>  $request->id_category_topic,
            'description' => $request->textimg_edit,
            'request' => $request,
            'source' => $request->textimg_edit,
            'config' => $configJson,
            'fieldImg' => 'image_edit', //Id do campo da imagem na view
        ];

        ImageController::ImageSave($imgDados, $request->uid_topic_img);


        return redirect()->route('articleedit', ['id' => $uid_articles])->with('success', 'Tópico alterado com sucesso!');
    }

    public function topicPublic($uid){

        $topic = Topic::where('uid', $uid)->first();

        $pb = $topic->public ? false: true;

        $topic->public = $pb;

        $topic->save();

        $uid_art = $topic->uid_from_who;

        return redirect()->route('articleedit', ['id' => $uid_art])->with('danger', "tópico excluído!");
    }


    public function topicErase($uid){

        $topico = Topic::where('uid', $uid)->first();
        $img = Image::where('uid_from_who', $uid)->first();

        if ($img != null) {

            if ($img->nickname != null && $img->nickname != 'Imagem Padrão') {
                Storage::delete($img->url);
            }

            $img->delete();
        }

        $id_art = $topico->uid_from_who;

        $topico->delete();


        return redirect()->route('articleedit', ['id' => $id_art])->with('danger', "tópico excluído!");
    }



}
