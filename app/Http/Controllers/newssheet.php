<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class newssheet extends Controller
{
    public function index($id){
        $news =  DB::table('news')->where('id', $id)->get()[0];
        return $news->isPublished ? view('news')->with('news', $news) : view('errors.404');
    }

    public function indexList(){
        return view('newsList')->with('news', DB::table('news')->orderByDesc('created_at')->paginate(12));
    }

}
