<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    public function index(){
        return view('index')->with([
            'products' => DB::table('products')->where('isPublished', '1')->get()->take(10),
            'news' => DB::table('news')->orderByDesc('id')->where('isPublished' , 1)->limit(5)->get()
        ]);
    }
}
