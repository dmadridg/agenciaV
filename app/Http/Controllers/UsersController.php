<?php

namespace App\Http\Controllers;

use Hash;
use \App\User;
use \App\Role;
use \App\Events\PusherEvent;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Show the main view.
     *
     */
    public function index(Request $req)
    {
        $title = "Usuarios de sistema";
        $menu = "Usuarios";

        $users = User::whereHas('role', function($query) {
            $query->where('env', 'sistema');
        })
        ->where('id', '!=', $this->current_user->id)
        ->get();

        if ($req->ajax()) {
            return view('users.system.table', ['users' => $users]);
        }
        return view('users.system.index', ['users' => $users, 'menu' => $menu, 'title' => $title]);
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
        $roles = Role::all();

        if ($id) {
            $user = User::find($id);
        }
        return view('users.system.form', ['user' => $user, 'roles' => $roles, 'menu' => $menu, 'title' => $title]);
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
        $user->role_id = $req->role_id;

        $user->save();

        $data = ['url' => url('admin/usuarios/sistema'), 'refresh' => 'table', 'user_id' => $this->current_user->id, 'status' => 'success', 'msg' => 'Nuevo usuario registrado correctamente'];
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
            $img = $this->upload_file($req->file('img'), 'img/users', true);


            $user->email = $req->email;
            $req->password ? $user->password = bcrypt($req->password) : '';
            $user->name = $req->name;
            $user->lastname = $req->lastname;
            $img ? $user->img = $img : '';
            $user->role_id = $req->role_id;

            $user->save();

            $data = ['url' => url('admin/usuarios/sistema'), 'refresh' => 'table', 'user_id' => $this->current_user->id, 'status' => 'success', 'msg' => 'Usuario modificado exitósamente'];
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
        $msg = count($req->ids) > 1 ? 'los usuarios selecciondos' : 'el usuario';
        $users = User::whereIn('id', $req->ids)
        ->get();
        //->delete();
        //->update(['status' => $req->status]);

        if ($users) {
            $data = ['url' => url('admin/usuarios/sistema'), 'refresh' => 'table', 'user_id' => $this->current_user->id, 'status' => 'success', 'msg' => 'Éxito eliminando '. $msg];
            event(new PusherEvent($data));
            return response($data, 200);
        } else {
            return response(['msg' => 'Error al cambiar el status de '.$msg, 'status' => 'error', 'url' => url('admin/usuarios/sistema')], 404);
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
            $data = ['url' => url('admin/usuarios/sistema'), 'user_id' => $this->current_user->id, 'status' => 'success', 'refresh' => 'table', 'msg' => 'Éxito cambiando el status del usuario'];
            event(new PusherEvent($data));
            return response($data, 200);
        } else {
            return response(['msg' => 'Usuario no encontrado o inválido', 'status' => 'error', 'url' => url('admin/usuarios/sistema')], 404);
        }
    }

    /**
     * Changes the user's password.
     *
     */
    public function change_password(Request $req)
    {
        $user = User::find(auth()->user()->id);

        if ($user) {
            if (Hash::check($req->current_pass, $user->password)) {
                if ($req->new_pass == $req->confirm_pass) {
                    $user->password = bcrypt($req->new_pass);
                    $user->save();
                    return response(['msg' => 'Contraseña modificada exitósamente', 'status' => 'ok'], 200);
                } else {
                    return response(['msg' => 'Las contraseñas no coinciden', 'status' => 'error'], 200);
                }
            } else {
                return response(['msg' => 'Contraseña errónea', 'status' => 'error'], 200);
            }
        } else {
            return response(['msg' => 'Usuario no válido o sesión expirada', 'status' => 'error'], 403);
        }
    }

    /**
     * change the user's profile picture
     *
     */
    public function change_profile_picture(Request $req)
    {
        $user = User::find($this->current_user->id);
        
        if ($user) {
        	$img = $this->upload_file($req->file('img'), 'img/profile', true);
	        $user->img = $img;
	        $user->save();
            
            return response(['msg' => 'Foto modificada exitósamente', 'status' => 'ok'], 200);
        } else {
            return response(['msg' => 'Ocurrió un error tratando de modificar la foto de perfil del usuario', 'status' => 'error'], 500);
        }
    }
}
