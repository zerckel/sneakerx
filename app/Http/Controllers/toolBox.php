<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class toolBox extends Controller
{
    public function addToBasket()
    {

        if (session()->has('basket')) {

            foreach (session('basket') as $index => $article) {
                if ($_GET['id'] === $article[0]) {
                    $res = $index;
                    break;
                }
            }

            if (isset($res)) {

                $basket = session('basket');
                $basket[$res][1] += intval($_GET['quantity']);
                session()->forget('basket');
                session(['basket' => $basket]);

            } else {
                session()->push('basket', [$_GET['id'], intval($_GET['quantity'])]);
            }

        } else {
            session(['basket' => [[$_GET['id'], intval($_GET['quantity'])]]]);
        }

        return response()->json([
            "result" => 1
        ])->setStatusCode(200);
    }
}
