<?php

namespace App\Http\Controllers;

use \App\Price;
use Illuminate\Http\Request;

class PricesController extends Controller
{
    /**
     * Show the main view.
     *
     */
    public function index(Request $req)
    {
        $menu = $title = "Porcentaje de intereses";

        $prices = Price::orderBy('monthly_payment')->get();

        if ($req->ajax()) {
            return view('pricing.content', ['prices' => $prices]);
        }
        return view('pricing.index', ['prices' => $prices, 'menu' => $menu, 'title' => $title]);
    }

    /**
     * Edit a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $price = Price::find($req->id);

        if (!$price) { return response(['msg' => 'Registro no encontrado', 'status' => 'error', 'refresh' => 'none'], 404); }
        
        if ($req->percentage >= 100 || $req->percentage <= 0) {
        	return response(['msg' => 'El porcentaje debe ser mayor que 0 y menor que 100', 'status' => 'error', 'refresh' => 'none'], 400);
        }
        $price->percentage = $req->percentage;

        $price->save();

        $data = ['url' => url('change-taxes'), 'refresh' => 'content', 'status' => 'success', 'msg' => 'Porcentaje modificado exitósamente'];
        return response($data, 200);
    }
}
