<?php

namespace App\Http\Controllers;

use \App\User;
use \App\Role;
use \App\Address;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Show the main view.
     *
     */
    public function index(Request $req)
    {
        $menu = $title = "Clientes";

        $users = User::whereHas('role', function($query) {
            $query->where('name', 'Cliente');
        })
        ->get();

        if ($req->ajax()) {
            return view('users.customers.content', ['users' => $users]);
        }
        return view('users.customers.index', ['users' => $users, 'menu' => $menu, 'title' => $title]);
    }

    /**
     * Show the form for creating/editing a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($id = 0)
    {
        $title = "Formulario";
        $menu = "Clientes";
        $user = null;

        if ($id) {
            $user = User::find($id);
        }
        return view('users.customers.form', ['user' => $user, 'menu' => $menu, 'title' => $title]);
    }

    /**
     * Save a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $req)
    {
        if (count(User::user_by_email($req->email))) {
            return response(['msg' => 'Este correo ya se encuentra en uso, trate con uno diferente.', 'status' => 'warning', 'refresh' => 'none'], 400);
        }

        $user = New User;

        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->fullname = $req->fullname;
        $user->photo = 'img/users/default.jpg';
        $user->phone = $req->phone;
        $user->role_id = 3;

        $user->save();

        #When customer fill the register form on landing page
        $url = url('clientes');
        if ($req->has('redirect')) {
            #Destroy the current session
            auth()->check() ? auth()->logout() : '';
            if (auth()->attempt(['email' => $req->email, 'password' => $req->password])) {
                $url = url($req->redirect);
            }
        }

        return response(['url' => $url, 'status' => 'success', 'msg' => 'Usuario registrado correctamente'], 200);
    }

    /**
     * Edit a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        if (count(User::user_by_email($req->email, $req->old_email))) {
            return response(['msg' => 'Este correo ya se encuentra en uso, trate con uno diferente.', 'status' => 'warning'], 400);
        }
        
        $user = User::find($req->id);

        if (!$user) { return response(['msg' => 'Cliente no encontrado', 'status' => 'error'], 404); }
        
        $img = $this->upload_file($req->file('photo'), 'img/users', true);

        $user->email = $req->email;
        $req->password ? $user->password = bcrypt($req->password) : '';
        $user->fullname = $req->fullname;
        $img ? $user->photo = $img : '';
        $user->phone = $req->phone;

        return response(['url' => url('clientes'), 'refresh' => 'content', 'user_id' => $this->current_user->id, 'status' => 'success', 'msg' => 'Usuario modificado exitósamente'], 200);
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
            $data = ['url' => url('clientes'), 'user_id' => $this->current_user->id, 'status' => 'success', 'refresh' => 'table', 'msg' => 'Éxito cambiando el status del cliente'];
            return response($data, 200);
        } else {
            return response(['msg' => 'Usuario no encontrado o inválido', 'status' => 'error', 'url' => url('clientes')], 404);
        }
    }

    /**
     *================================================================================================================================================================================================
     *=                                                                                 Functions for profile module                                                                                 =
     *================================================================================================================================================================================================
     */

    /**
     * Show the form for creating/editing a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_profile($id = 0)
    {
        $menu = $title = "Perfil";
        $address = $user = null;

        if (!$id) {
            $user = User::find($this->current_user->id);
            if ($user) { $address = $user->address; }
        }
        return view('profile.index', ['user' => $user, 'address' => $address, 'menu' => $menu, 'title' => $title]);
    }


    /**
     * Update the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function load_user_card(Request $req)
    {
        $address = $user = null;

        if ($req->ajax()) {
            $user = User::find($this->current_user->id);
            if ($user) { $address = $user->address; }
            return view('profile.card', ['user' => $user, 'address' => $address]);
        }
    }
}
