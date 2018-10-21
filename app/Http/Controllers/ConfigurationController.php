<?php

namespace App\Http\Controllers;

use \App\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    /**
     * Show the main view.
     *
     */
    public function index(Request $req)
    {
        $title = $menu = "Configuración";
        $config = Configuration::first();

        return view('configurations.index', ['config' => $config, 'menu' => $menu , 'title' => $title]);
    }

    /**
     * Save a new resource.
     *
     */
    public function save_terms_conditions(Request $req)
    {
    	$id = $req->id;

    	$config = $id ? Configuration::find($id) : New Configuration;
    	
    	$config->terms_conditions = $req->content;
        
        $config->save();

        $data = ['status' => 'success', 'msg' => 'Éxito guardando los términos y condiciones'];
        return response($data, 200);
    }

    /**
     * Edit a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_notice_privacy(Request $req)
    {
        $id = $req->id;

    	$config = $id ? Configuration::find($id) : New Configuration;
    	
    	$config->notice_privacy = $req->content;
        
        $config->save();

        $data = ['status' => 'success', 'msg' => 'Éxito guardando el aviso de privacidad'];
        return response($data, 200);
    }
}
