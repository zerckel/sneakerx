<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index($search)
    {
        return view('search')->with([
            'search' => $search,
            'results' => DB::table('products')->where([
                ["name", "LIKE", '%' . $search . '%'],
                ["isPublished", "===", 1]
            ])->paginate(9)
        ]);
    }
}
