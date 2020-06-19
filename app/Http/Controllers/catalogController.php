<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class catalogController extends Controller
{
    public function index()
    {
        return view('catalog')->with("brands", DB::table('brands')->paginate(15));
    }

    public function brandsId($id){
        return view('catalog')->with([
            "products" => DB::table('products')->where([
                ['brandId', '=', intval($id)],
                ['isPublished', '=', 1]
            ])->paginate(15),
            "brand" => DB::table('brands')->where('id', '=', $id)->get()[0]
        ])
            ;
    }
}
