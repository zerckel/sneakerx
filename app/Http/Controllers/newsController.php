<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class newsController extends Controller
{
    public function index()
    {
        return view('adminAdd');
    }

    public function addNews(Request $request)
    {
        $request->validate([
            'title' => 'bail|required|max:255',
            'resume' => 'bail|required',
            'content' => 'bail|required',
            'date' => 'bail|required',
            'published' => 'bail|required|boolean'
        ]);

        DB::table('news')->insertOrIgnore([
            'created_at' => $request->input('date'),
            'updated_at' => $request->input('date'),
            'title' => $request->input('title'),
            'content' => htmlentities($request->input('content')),
            'resume' => $request->input('resume'),
            'author' => Auth()->user()->name,
            'isPublished' => $request->input('published')
        ]);

        return redirect('/admin/news?message=News_add_with_success');
    }

    public function update($id)
    {
        return view('adminModify')->with([
            'data' => DB::table('news')
                ->where('id', '=', $id)->get()[0],
            'cat' => 'news'
        ]);
    }

    public function updateNews(Request $request)
    {
        DB::table('news')
            ->where('id', '=', $request->input('id'))->update([
            'created_at' => $request->input('date'),
            'updated_at' => $request->input('date'),
            'title' => $request->input('title'),
            'content' => htmlentities($request->input('content')),
            'resume' => $request->input('resume'),
            'author' => Auth()->user()->name,
            'isPublished' => $request->input('published')
        ]);

        return redirect('/admin/news?message=News_update_with_success');
    }
}
