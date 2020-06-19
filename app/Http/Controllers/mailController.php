<?php

namespace App\Http\Controllers;

use App\Mail\sendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    public function index(Request $request)
    {
        $users = DB::table('users')->get();
        foreach ($users as $index => $user) {
           Mail::to($user->email)->send(new sendMail($request->get('lastName'), $request->get('firstName'), $request->get('email'), $request->get('object'), $request->get('content')));
        }
        return response()->json(['success' => true]);
    }
}
