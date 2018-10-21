<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Events\PusherEvent;

class LoginController extends Controller
{
	/**
     * Validate the user login.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
		if (auth()->attempt(['email' => $req->email, 'password' => $req->password, 'status' => 1])) {
            if (auth()->user()->role->name == 'Administrador') {
                return redirect()->to('dashboard');
            } else {
                return redirect()->to('mi-comercio');
            }
        } else {
            $user = User::where('email', $req['email'])->first();
            if ( !$user ) {
                session()->forget('email');
                $errors = [ 'msg' => 'Usuario inválido'];
            } else {
                if ( !$user->status ) {
                    $errors = [ 'msg' => 'No tienes acceso al panel'];
                    session(['email' => $req['email']]);
                } else {
                    $errors = [ 'msg' => 'Contraseña incorrecta'];
                    session(['email' => $req['email']]);
                }
            }
            return redirect()->back()->withErrors($errors);
        }
	}

	/**
     * redirect to the dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function load_dashboard()
    {
        $title = $menu = 'Inicio';

        //$data = $this->get_dashboard_data();

        return view('layouts.dashboard', ['data' => json_decode(null), 'weekly_sales' => json_decode(null), 'title' => $title, 'menu' => $menu]);
    }

    /**
     * Shows the sign up form
     *
     * @return \Illuminate\Http\Response
     */
    public function sign_up()
    {
        return view('layouts.sign_up');
    }

    /**
     * Get the dashboard data.
     *
     */
    public function get_dashboard_data() 
    {
        $data = new \stdClass();

        #Total app users
        $data->total_app_users = User::whereHas('role', function($query) {
            $query->where('name', 'Cliente');
        })->count();

        #Total banned app users
        $data->banned_app_users = User::whereHas('role', function($query) {
            $query->where('name', 'Cliente');
        })
        ->where('status', 0)
        ->count();

        #Total of services regardless their status
        $data->total_services = Service::count();

        #Total of finished services
        $data->finished_services = Service::whereHas('status', function($query) {
            $query->where('name', 'Finalizado');
        })
        ->count();

        #Total amount paid by the customers of all the finished services
        $data->total_paid_by_user = Service::whereHas('status', function($query) {
            //$query->where('name', 'Finalizado');
        })
        ->sum('total');

        #Total fee charged by conekta
        $data->total_fee = Service::whereHas('status', function($query) {
            //$query->where('name', 'Finalizado');
        })
        ->sum('fee');

        #Total of profits
        $data->total_profits = $data->total_paid_by_user - $data->total_fee;

        #Total of users registered on the current month
        $data->new_users = User::whereHas('role', function($query) {
            $query->where('name', 'Cliente');
        })
        ->where('created_at', '>=', $this->actual_month.'-01')
        ->count();

        #Percentage of finished services
        $data->percentage_of_finished_services = $data->total_services == 0 ? 0 : round((($data->finished_services / $data->total_services) * 100), 2, PHP_ROUND_HALF_DOWN);
        
        #Percentage of banned users
        $data->percentage_of_banned_users = $data->total_app_users == 0 ? 0 : round((($data->banned_app_users / $data->total_app_users) * 100), 2, PHP_ROUND_HALF_DOWN);

        return json_encode($data);
    }

    /**
     * Get weekly sales.
     */
    public function get_weekly_sales() 
    {
        $day_name = array();
        $array_week_day = array();
        $array_sales_day = array();
        $current_week = array();
        $array_days = array('','Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
        $data_sales = Service::get_last_week_sales();

        for ( $i=0; $i <= 6; $i++ ) {
            $current_date = date_create($this->actual_date);
            $current_date = date_sub($current_date, date_interval_create_from_date_string($i.' days'));
            array_push($current_week, $current_date->format('Y-m-d'));
        }

        foreach ($current_week as $day) {
            array_push($day_name, $array_days[date('N', strtotime($day))]);
        }
        
        foreach ($data_sales as $value) {
            array_push($array_week_day, $value->created_at->format('Y-m-d'));
            array_push($array_sales_day, $value->total_paid);
        }

        $final_array = $current_week;

        foreach ($final_array as $key => $value) { $final_array[$key] = 0; }

        foreach ($array_week_day as $key => $val) {
            $found = array_search($val, $current_week);
            is_int($found) ? $final_array[$found] = $array_sales_day[$key] : '';
        }

        $object = new \stdClass();
        $object->week_days = array_reverse($day_name);
        $object->total_sales = array_reverse($final_array);

        return json_encode($object);
    }

    /**
     * Destroy's the current session.
     *
     */
    public function logout() 
    {
        auth()->logout();
        return redirect('/');
    }
}
