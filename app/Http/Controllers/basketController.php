<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class basketController extends Controller
{
    function index()
    {
        $articles = array();

        if (empty(session('basket'))) {

            return view('basket')->with('basket', $articles);
        }
        else {
            foreach (session('basket') as $articleId) {

                $article = DB::table('products')->where('id', '=', $articleId[0])->get();

                $article = (array)$article;
                array_push($article, $articleId[1]);
                array_push($articles, $article);
            }

            return view('basket')->with('basket', $articles);

        }


    }
}
