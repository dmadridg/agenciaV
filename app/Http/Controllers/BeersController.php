<?php

namespace App\Http\Controllers;

use \App\Beer;
use \App\BeerStyle;
use \App\BeerBusiness;
use \App\BeerStyleBusiness;

use Illuminate\Http\Request;

class BeersController extends Controller
{
	/**
     * Show the main view.
     *
     */
    public function index(Request $req)
    {
        $title = "Lista de cervezas";
        $menu = "Cervezas";
        $beers = Beer::orderBy('id', 'desc')->get();

        if ($req->ajax()) {
            return view('beers.content', ['beers' => $beers]);
        }
        return view('beers.index', ['beers' => $beers, 'menu' => $menu , 'title' => $title]);
    }

    /**
     * Show the form for creating/editing a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($id = 0)
    {
        $title = "Formulario";
        $menu = "Cervezas";
        $beer = null;
        if ($id) {
            $beer = Beer::find($id);
        }

        return view('beers.form', ['beer' => $beer, 'menu' => $menu, 'title' => $title]);
    }

    /**
     * Save a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $req)
    {
        $row = New Beer;

        $img = $this->upload_file($req->file('photo'), 'img/cervezas', true, ['width' => 600, 'height' => 440]);

        $row->title = $req->title;
        $row->description = $req->description;
        $row->photo = $img;

        $row->save();

        return response(['msg' => 'Cerveza registrada correctamente', 'url' => url('cervezas'), 'status' => 'success'], 200);
    }

    /**
     * Edit a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $row = Beer::find($req->id);
        if (!$row) { return response(['msg' =>'No se encontró el registro a editar', 'status' => 'error'], 404); }
        
        $img = $this->upload_file($req->file('photo'), 'img/cervezas', true,  ['width' => 600, 'height' => 440]);

        $row->title = $req->title;
        $row->description = $req->description;
        $img ? $row->photo = $img : '';

        $row->save();

        return response(['msg' => 'Registro actualizado correctamente', 'status' => 'success', 'url' => url('cervezas')], 200);
    }

    /**
     * Change the status of the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $req)
    {
        $msg = count($req->ids) > 1 ? 'las cervezas' : 'la cerveza';
        $rows = Beer::whereIn('id', $req->ids)
        ->get();
        if ($rows) {
            foreach ($rows as $row) {
                //Delete beer style business also
                foreach ($row->styles as $style) {
                    BeerStyleBusiness::where('beer_style_id', $style->id)->delete();
                }
                BeerBusiness::where('beer_id', $row->id)->delete();
                BeerStyle::where('beer_id', $row->id)->delete();
                $row->delete();
            }
            return response(['msg' => 'Éxito eliminando '.$msg, 'url' => url('cervezas'), 'status' => 'success'], 200);
        } else {
            return response(['msg' => 'Error al cambiar el status de '.$msg, 'status' => 'error', 'url' => url('cervezas')], 404);
        }
    }

    /**
     *========================================================================================================================================
     *=                                  Empiezan las funciones relacionadas al módulo de estilos de cerveza                                 =
     *========================================================================================================================================
     */

    /**
     * Show the main view.
     *
     */
    public function style_index(Request $req)
    {
        $title = "Estilos de cervezas";
        $menu = "Cervezas";
        $styles = BeerStyle::orderBy('id', 'desc')->get();

        if ($req->ajax()) {
            return view('beers.styles.table', ['styles' => $styles]);
        }
        return view('beers.styles.index', ['styles' => $styles, 'menu' => $menu , 'title' => $title]);
    }

    /**
     * Show the form for creating/editing a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function style_form($id = 0)
    {
        $title = "Formulario";
        $menu = "Cervezas";
        $beers = Beer::all();
        $style = null;
        if ($id) {
            $style = BeerStyle::find($id);
        }

        return view('beers.styles.form', ['beers' => $beers, 'style' => $style, 'menu' => $menu, 'title' => $title]);
    }

    /**
     * Save a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function style_save(Request $req)
    {
        $row = New BeerStyle;

        $row->beer_id = $req->beer_id;
        $row->title = $req->title;
        $row->description = $req->description;

        $row->save();

        return response(['msg' => 'Estilo de cerveza registrado correctamente', 'url' => url('cervezas/estilos'), 'status' => 'success'], 200);
    }

    /**
     * Edit a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function style_update(Request $req)
    {
        $row = BeerStyle::find($req->id);
        if (!$row) { return response(['msg' =>'No se encontró el registro a editar', 'status' => 'error'], 404); }
        
        $row->beer_id = $req->beer_id;
        $row->title = $req->title;
        $row->description = $req->description;

        $row->save();

        return response(['msg' => 'Registro actualizado correctamente', 'status' => 'success', 'url' => url('cervezas/estilos')], 200);
    }

    /**
     * Change the status of the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function style_delete(Request $req)
    {
        $msg = count($req->ids) > 1 ? 'los registros' : 'el registro';
        $rows = BeerStyle::whereIn('id', $req->ids)
        ->get();

        if ($rows) {
            foreach ($rows as $row) {
                BeerStyleBusiness::where('beer_style_id', $row->id)->delete();
                BeerStyle::where('id', $row->id)->delete();
                $row->delete();
            }
            return response(['msg' => 'Éxito eliminando '.$msg, 'url' => url('cervezas/estilos'), 'status' => 'success'], 200);
        } else {
            return response(['msg' => 'Error al cambiar el status de '.$msg, 'status' => 'error', 'url' => url('cervezas/estilos')], 404);
        }
    }
}
