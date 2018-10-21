<?php

namespace App\Http\Controllers;

use \App\Area;
use \App\Events\PusherEvent;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    /**
     * Show the main view.
     *
     */
    public function index(Request $req)
    {
        $title = $menu = "Áreas";
        $areas = Area::all();

        if ($req->ajax()) {
            return view('areas.table', ['areas' => $areas]);
        }
        return view('areas.index', ['areas' => $areas, 'menu' => $menu , 'title' => $title]);
    }

    /**
     * Show the form for creating/editing a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($id = 0)
    {
        $title = "Formulario";
        $menu = "Áreas";
        $area = null;
        if ($id) {
            $area = Area::find($id);
        }
        return view('areas.form', ['area' => $area, 'menu' => $menu, 'title' => $title]);
    }

    /**
     * Save a new resource.
     *
     */
    public function save(Request $req)
    {
        $area = New Area;

        $area->name = $req->name;

        $area->save();

        $data = ['url' => url('admin/areas'), 'user_id' => $this->current_user->id, 'status' => 'success', 'refresh' => 'table', 'msg' => 'Éxito guardando el Área'];

        return response($data, 200);
    }

    /**
     * Edit a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $area = Area::find($req->id);
        if ($area) {
            $area->name = $req->name;

	        $area->save();

	        return response(['msg' => 'Área actualizada correctamente', 'status' => 'success', 'refresh' => 'table', 'url' => url('admin/areas')], 200);
        }

	    return response(['msg' => 'No se encontró el área a editar', 'status' => 'error', 'url' => url('admin/areas')], 404);
    }

    /**
     * Change the status of the specified resource.
     *
     */
    public function change_status(Request $req)
    {
    	$areas = Area::whereIn('id', $req->ids)
        ->update(['status' => $req->change_to]);
    	//delete();
    	if ($areas) {
    		$data = ['url' => url('admin/areas'), 'user_id' => $this->current_user->id, 'status' => 'success', 'refresh' => 'table', 'msg' => 'Éxito cambiando el status del Área'];
            event(new PusherEvent($data));
            return response($data, 200);
    	} else {
            return response(['msg' => 'Área no encontrada o inválida', 'status' => 'error', 'url' => url('admin/areas')], 404);
    	}
	}

    /**
     * Delete the specified resource.
     *
     */
    public function delete(Request $req)
    {
    	$areas = Area::whereIn('id', $req->ids)->get();
    	//delete();
    	if ($areas) {
    		$data = ['url' => url('admin/areas'), 'user_id' => $this->current_user->id, 'status' => 'success', 'refresh' => 'table', 'msg' => 'Éxito eliminando el Área'];
            event(new PusherEvent($data));
            return response($data, 200);
    	} else {
            return response(['msg' => 'Imágen no encontrada', 'status' => 'error', 'url' => url('admin/areas')], 404);
    	}
	}
}
