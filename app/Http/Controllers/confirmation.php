<?php

namespace App\Http\Controllers;

use App\Mail\sendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class confirmation extends Controller
{
    public function index(Request $request)
    {

        $users = DB::table('users')->get();
        foreach ($users as $index => $user) {
            Mail::to($user->email)->send(new sendMail($request->all()[1]['name'], '', $request->all()[1]['email'], 'Your order', 'your order has been confirmed'));
        }

        Mail::to($request->all()[1]['email'])->send(new sendMail('SneakerX', '', $users[0]->email, 'Your order', 'your order has been confirmed'));

        $id = DB::table('orderinformation')->insertGetId([
            'products' => serialize($request->all()[0]),
            'name' => $request->all()[1]['name'],
            'email' => $request->all()[1]['email'],
            'address' => $request->all()[1]['address'] . ' ' . $request->all()[1]['postal']
        ]);

        session(['lastOrder' => $id]);

        return response()->json([
            "success" => 1
        ])->setStatusCode(200);
    }

    public function finalPage(){
        if (empty(session('lastOrder')))
            return view('errors.404');

        return view('confirmation')->with("order", DB::table('orderinformation')->where(
            'id', '=', session('lastOrder')
        )->get()[0]);
    }
}
