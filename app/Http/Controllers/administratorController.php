<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class administratorController extends Controller
{
    public function index()
    {
        return Auth::check() ? redirect('/admin/brands') : view('Admin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function brands()
    {

        $message = isset($_GET['message']) ? $_GET['message'] : false;

        return view('Admin')->with([
            'data' => DB::table('brands')->get(),
            'message' => $message
        ]);
    }

    public function products()
    {

        $message = isset($_GET['message']) ? $_GET['message'] : false;

        return view('Admin')->with([
            'data' => DB::table('products')->get(),
            'message' => $message
        ]);
    }

    public function news()
    {

        $message = isset($_GET['message']) ? $_GET['message'] : false;

        return view('Admin')->with([
            'data' => DB::table('news')->get(),
            'message' => $message
        ]);
    }

    public function deleteNews($id)
    {
        DB::table('news')->where('id', '=', $id)->delete();
        return redirect('/admin/news?message=success');
    }

    public function deleteProducts($id)
    {
        DB::table('products')->where('id', '=', $id)->delete();
        return redirect('/admin/products?message=success');
    }

    public function deleteBrands($id)
    {
        $res = DB::table('brands')->select('banner', 'pics')
            ->where('id', '=', $id)->get()[0];

        Storage::delete(['public/brands/' . $res->banner, 'public/brands/' . $res->pics]);
        DB::table('brands')->where('id', '=', $id)->delete();
        DB::table('products')->where('brandId', '=', $id)->delete();
        return redirect('/admin/brands?message=success');
    }
}
