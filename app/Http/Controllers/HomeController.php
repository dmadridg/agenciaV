<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Events\PusherEvent;

class HomeController extends Controller
{
	/**
     * Validate the user Home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
		$title = $menu = 'Viajeros';

        //$data = $this->get_dashboard_data();

        return view('viajeros', ['data' => json_decode(null), 'weekly_sales' => json_decode(null), 'title' => $title, 'menu' => $menu]);
	}

    public function membresias(Request $req)
    {
        $title = $menu = 'Membresias';

        //$data = $this->get_dashboard_data();

        return view('membresias', ['data' => json_decode(null), 'weekly_sales' => json_decode(null), 'title' => $title, 'menu' => $menu]);
    }

    public function agencias(Request $req)
    {
        $title = $menu = 'Agencias';

        //$data = $this->get_dashboard_data();

        return view('agencias', ['data' => json_decode(null), 'weekly_sales' => json_decode(null), 'title' => $title, 'menu' => $menu]);
    }

	public function socios(Request $req)
    {
        $title = $menu = 'Socios';

        //$data = $this->get_dashboard_data();

        return view('socios', ['data' => json_decode(null), 'weekly_sales' => json_decode(null), 'title' => $title, 'menu' => $menu]);
    }

    public function operadores(Request $req)
    {
        $title = $menu = 'Operadores';

        //$data = $this->get_dashboard_data();

        return view('operadores', ['data' => json_decode(null), 'weekly_sales' => json_decode(null), 'title' => $title, 'menu' => $menu]);
    }

    public function empresas(Request $req)
    {
        $title = $menu = 'Empresas';

        //$data = $this->get_dashboard_data();

        return view('empresas', ['data' => json_decode(null), 'weekly_sales' => json_decode(null), 'title' => $title, 'menu' => $menu]);
    }
}
