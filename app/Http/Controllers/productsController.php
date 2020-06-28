<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productsController extends Controller
{
    public function index()
    {
        return view('adminAdd');
    }

    public function addProduct(Request $request)
    {

        $request->validate([
            'name' => 'bail|required',
            'color' => 'bail|required',
            'brand' => 'bail|required',
            'price' => 'bail|required',
            'description' => 'bail|required|min:30',
            'published' => 'bail|required|boolean',
            'pics' => 'bail|required|image|mimes:png',
            'secondary.*' => 'bail|image|mimes:png'
        ]);

        $request->file('pics')->storeAs('public/products', $request->file('pics')->getBasename() . '.' . $request->file('pics')->getClientOriginalExtension());

        $secondary = [];
        foreach ($request->file('secondary') as $image) {
            $image->storeAs('public/products', $image->getBasename() . '.' . $image->getClientOriginalExtension());
            array_push($secondary, $image->getBasename() . '.' . $image->getClientOriginalExtension());
        }

        $color = explode(",", $request->input('color'));

        DB::table('products')
            ->insertOrIgnore([
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'name' => $request->input('name'),
                'description' => htmlentities($request->input('description')),
                'brandId' => $request->input('brand'),
                'price' => $request->input('price'),
                'isPublished' => $request->input('published'),
                'colors' => serialize($color),
                'mainpics' => $request->file('pics')->getBasename() . '.' . $request->file('pics')->getClientOriginalExtension(),
                'secondarypics' => serialize($secondary)
            ]);

        return redirect('/admin/products?message=Products_add_with_success');
    }

    public function update($id)
    {

        return view('adminModify')->with([
            'data' => DB::table('products')
                ->join('brands', 'products.brandId', '=', 'brands.id')
                ->where('products.id', '=', $id)->select('products.*', 'brands.name as brandName')->get()[0],
            'cat' => 'products'
        ]);
    }

    public function updateProduct(Request $request)
    {
        $request->validate([
            'name' => 'bail|required',
            'color' => 'bail|required',
            'brand' => 'bail|required',
            'price' => 'bail|required',
            'description' => 'bail|required|min:30',
            'published' => 'bail|required|boolean',
            'pics' => 'bail|image|mimes:png',
            'secondary.*' => 'bail|image|mimes:png'
        ]);

        if (!empty($request->file('pics'))) {

            $request->file('pics')->storeAs('public/products', $request->file('pics')->getBasename() . '.' . $request->file('pics')->getClientOriginalExtension());

            DB::table('products')
                ->where('id', '=', $request->input('id'))
                ->update([
                    'mainpics' => $request->file('pics')->getBasename() . '.' . $request->file('pics')->getClientOriginalExtension()
                ]);
        }

        if (!empty($request->file('secondary'))) {
            $secondary = [];
            foreach ($request->file('secondary') as $image) {
                $image->storeAs('public/products', $image->getBasename() . '.' . $image->getClientOriginalExtension());
                array_push($secondary, $image->getBasename() . '.' . $image->getClientOriginalExtension());
            }

            DB::table('products')
                ->where('id', '=', $request->input('id'))
                ->update([
                    'secondarypics' => serialize($secondary)
                ]);
        }

        $color = explode(",", $request->input('color'));

        DB::table('products')
            ->where('id', '=', $request->input('id'))
            ->update([
                'updated_at' => Carbon::now(),
                'name' => $request->input('name'),
                'description' => htmlentities($request->input('description')),
                'brandId' => $request->input('brand'),
                'price' => $request->input('price'),
                'isPublished' => $request->input('published'),
                'colors' => serialize($color)
            ]);

        return redirect('/admin/products?message=Products_update_with_success');
    }
}
