<?php

namespace App\Http\Controllers;

use Hash;
use \App\Area;
use \App\User;
use \App\Role;
use \App\AreaUser;
use \App\Events\PusherEvent;
use Illuminate\Http\Request;

class WaitersController extends Controller
{
    /**
     * Show the main view.
     *
     */
    public function index(Request $req)
    {
        $title = "Meseros";
        $menu = "Usuarios";

        $users = User::whereHas('role', function($query) {
            $query->where('role', 'Mesero');
        })
        ->get();

        if ($req->ajax()) {
            return view('users.waiters.table', ['users' => $users]);
        }
        return view('users.waiters.index', ['users' => $users, 'menu' => $menu, 'title' => $title]);
    }

    /**
     * Show the form for creating/editing a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($id = 0)
    {
        $title = "Formulario";
        $menu = "Usuarios";
        $user = null;
        $areas = Area::all();

        if ($id) {
            $user = User::find($id);
        }

        return view('users.waiters.form', ['user' => $user, 'areas' => $areas,'menu' => $menu, 'title' => $title]);
    }

    /**
     * Save a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $req)
    {
        if (count(User::user_by_email($req->email))) {
            return response(['msg' => 'Este correo ya se encuentra en uso, trate con uno diferente.', 'status' => 'error', 'refresh' => 'none'], 200);
        }

        $user = New User;

        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->name = $req->name;
        $user->lastname = $req->lastname;
        $user->img = 'img/users/default.jpg';
        $user->role_id = 4;

        $user->save();

        if (count($req->areas_id)) {
        	foreach ($req->areas_id as $a_id) {
        		$area_user = New AreaUser;
        		
        		$area_user->area_id = $a_id;
        		$area_user->user_id = $user->id;
        		
        		$area_user->save();
        	}
        }

        $data = ['url' => url('admin/usuarios/meseros'), 'refresh' => 'table', 'user_id' => $this->current_user->id, 'status' => 'success', 'msg' => 'Nuevo mesero registrado correctamente'];
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
        if (count(User::user_by_email($req->email, $req->old_email))) {
            return response(['msg' => 'Este correo ya se encuentra en uso, trate con uno diferente.', 'status' => 'error', 'refresh' => 'none'], 200);
        }
        
        $user = User::find($req->id);

        if ($user) {
            $user->email = $req->email;
            $req->password ? $user->password = bcrypt($req->password) : '';
            $user->name = $req->name;
            $user->lastname = $req->lastname;
            $user->img = 'img/default.jpg';

            $user->save();

            if (count($req->areas_id)) {
            	AreaUser::where('user_id', $user->id)->delete();
	        	
	        	foreach ($req->areas_id as $a_id) {
	        		$area_user = New AreaUser;
	        		
	        		$area_user->area_id = $a_id;
	        		$area_user->user_id = $user->id;
	        		
	        		$area_user->save();
	        	}
	        }

            $data = ['url' => url('admin/usuarios/meseros'), 'refresh' => 'table', 'user_id' => $this->current_user->id, 'status' => 'success', 'msg' => 'Mesero modificado exitósamente'];
            event(new PusherEvent($data));
            return response($data, 200);
        }

        return response(['msg' => '', 'status' => 'error', 'refresh' => 'none'], 200);
    }

    /**
     * Change the status of the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $req)
    {
        $msg = count($req->ids) > 1 ? 'los meseros selecciondos' : 'el mesero';
        $users = User::whereIn('id', $req->ids)
        ->get();
        //->delete();
        //->update(['status' => $req->status]);

        if ($users) {
            $data = ['url' => url('admin/usuarios/meseros'), 'refresh' => 'table', 'user_id' => $this->current_user->id, 'status' => 'success', 'msg' => 'Éxito eliminando '. $msg];
            event(new PusherEvent($data));
            return response($data, 200);
        } else {
            return response(['msg' => 'Error al cambiar el status de '.$msg, 'status' => 'error', 'url' => url('admin/usuarios/meseros')], 404);
        }
    }

    /**
     * Change the status of the specified resource.
     *
     */
    public function change_status(Request $req)
    {
        $areas = User::whereIn('id', $req->ids)
        ->update(['status' => $req->change_to]);
        //delete();
        if ($areas) {
            $data = ['url' => url('admin/usuarios/meseros'), 'user_id' => $this->current_user->id, 'status' => 'success', 'refresh' => 'table', 'msg' => 'Éxito cambiando el status del mesero'];
            event(new PusherEvent($data));
            return response($data, 200);
        } else {
            return response(['msg' => 'Usuario no encontrado o inválido', 'status' => 'error', 'url' => url('admin/usuarios/meseros')], 404);
        }
    }
}
