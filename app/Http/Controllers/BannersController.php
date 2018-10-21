<?php

namespace App\Http\Controllers;

use \App\Banner;
use \App\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannersController extends Controller
{
    /**
     * Show the main view.
     *
     */
    public function index(Request $req)
    {
        $title = $menu = "Banners";
        $banners = Banner::orderBy('id', 'desc')->get();

        if ($req->ajax()) {
            return view('banners.content', ['banners' => $banners]);
        }
        return view('banners.index', ['banners' => $banners, 'menu' => $menu , 'title' => $title]);
    }

    /**
     * Show the form for creating/editing a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($id = 0)
    {
        $title = "Formulario";
        $menu = "Banners";
        $banner = null;
        $businesses = Business::all();

        if ($id) {
            $banner = Banner::find($id);
        }
        return view('banners.form', ['banner' => $banner, 'businesses' => $businesses, 'menu' => $menu, 'title' => $title]);
    }

    /**
     * Save a new resource.
     *
     */
    public function save(Request $req)
    {
        $banner = New Banner;

        $img = $this->upload_file($req->file('photo'), 'img/espacios-app', true, ['width' => 357, 'height' => 95]);

        $banner->photo = $img;
        $banner->business_id = $req->business_id;

        $banner->save();

        return response(['url' => url('espacios-fotos-app'), 'status' => 'success', 'msg' => 'Éxito guardando el banner'], 200);
    }

    /**
     * Update a resource.
     *
     */
    public function update(Request $req)
    {
        $banner = Banner::find($req->id);

        if (!$banner) { return response(['msg' => 'Banner no encontrado, trate nuevamente recargando esta página'], 404); }

        $img = $this->upload_file($req->file('photo'), 'img/espacios-app', true, ['width' => 357, 'height' => 95]);

        $img ? $banner->photo = $img : '';
        $banner->business_id = $req->business_id;

        $banner->save();

        return response(['url' => url('espacios-fotos-app'), 'status' => 'success', 'msg' => 'Éxito actualizando el banner'], 200);
    }

    /**
     * Delete the specified resource.
     *
     */
    public function delete(Request $req)
    {
    	$banners = Banner::whereIn('id', $req->ids)->get();
    	if ($banners) {
            foreach ($banners as $banner) {
                File::delete(public_path($banner->photo));
                $banner->delete();
            }
    			
            return response(['url' => url('espacios-fotos-app'), 'status' => 'success', 'msg' => 'Éxito eliminando el banner'], 200);
    	} else {
            return response(['msg' => 'Banner no encontrado', 'status' => 'error'], 404);
    	}
	}
}
