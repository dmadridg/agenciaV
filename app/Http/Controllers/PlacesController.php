<?php

namespace App\Http\Controllers;

use \App\Area;
use \App\Place;
use \App\Events\PusherEvent;
use Illuminate\Http\Request;

class PlacesController extends Controller
{
    /**
     * Show the main view.
     *
     */
    public function index(Request $req)
    {
        $title = $menu = "Espacios";
        $places = Place::all();

        if ($req->ajax()) {
            return view('places.table', ['places' => $places]);
        }
        return view('places.index', ['places' => $places, 'menu' => $menu , 'title' => $title]);
    }

    /**
     * Show the form for creating/editing a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($id = 0)
    {
        $title = "Formulario";
        $menu = "Espacios";
        $place = null;
        $areas = Area::all();

        if ($id) {
            $place = Place::find($id);
        }
        return view('places.form', ['place' => $place, 'areas' => $areas, 'menu' => $menu, 'title' => $title]);
    }

    /**
     * Save a new resource.
     *
     */
    public function save(Request $req)
    {
        $place = New Place;

        $place->name = $req->name;
        $place->area_id = $req->area_id;
        $place->type = $req->type;

        $place->save();

        $data = ['url' => url('admin/espacios'), 'user_id' => $this->current_user->id, 'status' => 'success', 'refresh' => 'table', 'msg' => 'Éxito guardando el espacio'];
        event(new PusherEvent($data));
        return response($data, 200);
    }

    /**
     * Edit a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $place = Place::find($req->id);
        if ($place) {
            $place->name = $req->name;
            $place->area_id = $req->area_id;
        	$place->type = $req->type;

	        $place->save();

	        $data = ['url' => url('admin/espacios'), 'user_id' => $this->current_user->id, 'status' => 'success', 'refresh' => 'table', 'msg' => 'Espacio actualizado correctamente'];
        	event(new PusherEvent($data));
        	return response($data, 200);
        }

	    return response(['msg' => 'No se encontró el espacio a editar', 'status' => 'error', 'url' => url('admin/espacios')], 404);
    }

    /**
     * Change the status of the specified resource.
     *
     */
    public function change_status(Request $req)
    {
    	$areas = Place::whereIn('id', $req->ids)
        ->update(['status' => $req->change_to]);
    	//delete();
    	if ($areas) {
    		$data = ['url' => url('admin/espacios'), 'user_id' => $this->current_user->id, 'status' => 'success', 'refresh' => 'table', 'msg' => 'Éxito cambiando el status del espacio'];
            event(new PusherEvent($data));
            return response($data, 200);
    	} else {
            return response(['msg' => 'Espacio no encontrado o inválido', 'status' => 'error', 'url' => url('admin/espacios')], 404);
    	}
	}

    /**
     * Delete the specified resource.
     *
     */
    public function delete(Request $req)
    {
    	$areas = Place::whereIn('id', $req->ids)->get();
    	//delete();
    	if ($areas) {
    		$data = ['url' => url('admin/espacios'), 'user_id' => $this->current_user->id, 'status' => 'success', 'refresh' => 'table', 'msg' => 'Éxito eliminando el espacio'];
            event(new PusherEvent($data));
            return response($data, 200);
    	} else {
            return response(['msg' => 'Espacio no encontrado', 'status' => 'error', 'url' => url('admin/espacios')], 404);
    	}
	}
}
