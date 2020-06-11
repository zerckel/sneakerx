<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class productsheet extends Controller
{
    public function index($id)
    {
        $product = DB::table('products')
            ->join('brands', 'products.brandId', '=', 'brands.Id')
            ->where('products.id', $id)->select('products.*', 'brands.name as brandName')
            ->get()[0];

        if ($product->isPublished) {

            return view('product')->with(
                'product', $product
            );
        } else {
            return view('errors.404');
        }

    }
}
