<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class administratorController extends Controller
{
    public function index()
    {

        return Auth::check() ? $this->catalog() : view('Admin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function catalog(){
        return view('Admin')->with('data', DB::table('brands')->get());
    }
}
