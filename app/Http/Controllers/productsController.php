<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productsController extends Controller
{
    public function index(){
        return view('adminAdd');
    }

    public function addProduct(Request $request){

        ddd($request->file('secondary'));

        $request->validate([
           'name' => 'bail|required|max:255',
           'color' => 'bail|required',
           'brand' => 'bail|required',
           'price' => 'bail|required',
           'description' => 'bail|required|min:30',
           'published' => 'bail|required|boolean',
           'pics' => 'bail|required|image',
           'secondary' => 'bail|image'
        ]);


        $secondary =  [];
        foreach ($request->input('secondary') as $image){
            $image->storeAs('public/products', $image->getBasename());
            array_push($secondary, $image->getBasename());
        };

        DB::table('products')
            ->insertOrIgnore([
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'brandId' => $request->input('brand'),
                'price' => $request->input('price'),
                'isPublished' => $request->input('published'),
                'colors' => serialize($request->input('colors')),
                'mainpics' => $request->input('main'),
                'secondarypics' => serialize($request->input('secondary'))
            ]);

    }
}
