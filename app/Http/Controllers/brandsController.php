<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class brandsController extends Controller
{
    public function index()
    {
        return view('adminAdd');
    }

    public function addBrand(Request $request)
    {

        $request->validate([
            'name' => 'bail|required|max:255',
            'description' => 'bail|required|min:20',
            'pics' => 'bail|required|image|mimes:png',
            'banner' => 'bail|required|image|mimes:png'
        ]);

        $pics = $request->file('pics');
        $banner = $request->file('banner');

        $res = DB::table('brands')->insertOrIgnore(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'name' => $request->input('name'),
                'banner' => $banner->getBasename() . '_banner.png',
                'pics' => $pics->getBasename() . '_pics.png',
                'description' => $request->input('description'),
            ]
        );

        $pics->storeAs('public/brands', $pics->getBasename() . '_pics.png');
        $banner->storeAs('public/brands', $banner->getBasename() . '_banner.png');

        if ($res) {
            return redirect('/admin/brands?message=Brands_add_with_success');
        } else {
            return redirect('/admin/brands?message=error&success=0');
        }

    }

    public function update($id)
    {
        return view('adminModify')->with([
            'data' => DB::table('brands')->where('id', '=', $id)->get()[0],
            'cat' => 'brands'
        ]);
    }

    public function updateBrand(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|max:255',
            'description' => 'bail|required|min:20',
            'pics' => 'bail|image|mimes:png|dimensions:min_width=220',
            'banner' => 'bail|image'
        ]);

        if (!empty($request->file('pics')) || !empty($request->file('banner'))) {

            $res = DB::table('brands')
                ->where('id', '=', $request->input('id'))
                ->select('pics', 'banner')->get()[0];

            if (!empty($request->file('pics'))) {
                DB::table('brands')
                    ->where('id', '=', $request->input('id'))
                    ->update([
                        'pics' => $request->file('pics')->getBasename() . '_pics.png'
                    ]);
                Storage::delete('public/brands/' . $res->pics);
                $request->file('pics')->storeAs('public/brands', $request->file('pics')->getBasename() . '_pics.png');
            }
            if (!empty($request->file('banner'))) {
                DB::table('brands')
                    ->where('id', '=', $request->input('id'))
                    ->update([
                        'banner' => $request->file('banner')->getBasename() . '_banner.png'
                    ]);
                Storage::delete('public/brands/' . $res->banner);
                $request->file('banner')->storeAs('public/brands', $request->file('banner')->getBasename() . '_banner.png');
            }
        }


        DB::table('brands')
            ->where('id', '=', $request->input('id'))
            ->update([
                'updated_at' => \Carbon\Carbon::now(),
                'name' => $request->input('name'),
                'description' => $request->input('description')
            ]);

        return redirect('/admin/brands?message=Update_made_with_success');
    }
}
