<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Controllers\CoreController;

class ArticleController extends Controller
{
    public static function ArticleList(){

            $articlesList = Article::all();

        return $articlesList;
    }


    public static function ArticleSave(Request $request){

        $config = CoreController::config();
        $status = CoreController::status();

        dd($request);

        return;

    }


}
