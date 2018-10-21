<?php

namespace App\Http\Controllers;

use Hash;
use \App\Faq;
use \App\News;
use \App\User;
use \App\Like;
use \App\Event;
use \App\Banner;
use \App\Business;
use \App\BusinessData;
use \App\Configuration;
use \App\Events\PusherEvent;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Sing up a new customer
     *
     * @param  Request $req
     * @return $customer
     */
    public function sing_up_customer(Request $req)
    {
        //If customer already exist check if need to be
        if (count(User::user_by_email($req->email))) {
            //If its a social network, means that user does not need to be sing up.
            if ($req->social_network) {
                $customer = User::where('email', $req->email)
                ->where('social_network', '!=', 0)//Facebook or google
                ->where('role_id', 3)//Customer
                ->first();

                if ($customer) {
                    //$this->check_in($customer->id);
                    return response(['msg' => 'Usuario logueado correctamente', 'status' => 'ok', 'data' => $customer->setHidden(['role_id', 'password', 'remember_token','created_at', 'updated_at'])], 200);
                }
                return response(['msg' => 'Inicio de sesión inválido, verifique sus datos porfavor', 'status' => 'error'], 200);
            }
            return response(['msg' => 'Éste correo ya está siendo utilizado, porfavor, elija uno diferente', 'status' => 'error'], 200);
        } else {
            $customer = new User;

            if (!$req->social_network) {
                $customer->password = bcrypt($req->password);
            }
            $customer->fullname = $req->fullname;
            $customer->email = $req->email;
            $customer->photo = 'img/users/default.jpg';
            $customer->phone = $req->phone;
            $customer->social_network = $req->social_network;
            $customer->player_id = $req->player_id;
            $customer->role_id = 3;//Role customer

            $customer->save();

            //$this->check_in($customer->id);

            return response(['msg' => 'Usuario registrado correctamente', 'status' => 'ok', 'data' => $customer->setHidden(['role_id', 'password', 'created_at', 'updated_at'])], 200);
        }
    }

    /**
     * Customer login
     *
     * @param  Request  $request
     * @return $usuario si es correcto el inicio de sesión o 0 si los datos son incorrectos.
     */
    public function sing_in_customer(Request $req)
    {
        $customer = User::where('email', $req->email)
        ->where('status', 1)
        ->where('role_id', 5)
        ->first();
        if ($customer) {
            if (Hash::check($req->password, $customer->password)) {
                //$this->check_in($customer->id);
                return response(['msg' => 'Inicio de sesión correcto', 'status' => 'ok', 'data' => $customer->setHidden(['role_id', 'created_at', 'updated_at'])], 200);
            }
            return response(['msg' => 'Contraseña errónea', 'status' => 'error'], 200);
        }
        return response(['msg' => 'Correo inválido', 'status' => 'error'], 200);
    }

    /**
     * Sign up a new ecommerce
     *
     * @param  Request  $request
     */
    public function sing_up_ecommerce(Request $req)
    {
        if (count(User::user_by_email($req->email))) { return response(['msg' => 'Este correo ya está siendo utilizado, use uno distinto', 'status' => 'error'], 400); }

        /*Let's create a user*/
        $user = New User; 

        $user->fullname = $req->fullname;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->photo = 'img/users/default.jpg';
        $user->phone = $req->phone;
        $user->role_id = 2;

        $user->save();

        /*Let's create his business*/
        $ecommerce = New Business;

        $ecommerce->name = 'Mi negocio';
        $ecommerce->user_id = $user->id;
        $ecommerce->category_id = 0;
        $ecommerce->space_type_id = 3;
        $ecommerce->logo = 'img/logo-default.jpg';
        $ecommerce->cover_photo = 'img/card-bg-2.jpg';
        $ecommerce->range_price = '20 a 1000 pesos.';
        $ecommerce->latitude = 0;
        $ecommerce->longitude = 0;
        $ecommerce->code = $this->get_random_code();

        $ecommerce->save();

        /*Let's create his business*/
        $data = New BusinessData;

        $data->name = 'Mi negocio';
        $data->business_id = $ecommerce->id;
        $data->category_id = 0;
        $data->logo = 'img/logo-default.jpg';
        $data->cover_photo = 'img/card-bg-2.jpg';
        $data->range_price = '20 a 1000 pesos.';
        $data->latitude = 0;
        $data->longitude = 0;

        $data->save();

        $params = array();
        $params['view'] = 'mails.credentials';
        $params['title'] = 'Registro completado exitósamente';
        $params['subject'] = 'Bienvenido';
        $params['email'] = $req->email;
        $params['content'] = 'Bienvenido '.$req->fullname.' a la aplicación Vive chapultepec, a continuación se muestran sus credenciales de acceso al panel administrativo de su comercio: ';
        $params['password'] = $req->password;

        $this->f_mail($params);

        return response(['msg' => 'Registro realizado correctamente', 'status' => 'success'], 200);
    }

    /**
     * Update an user, no matter his role.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_user(Request $req)
    {
        $user = User::find($req->id);

        if (!$user) { return response(['msg' => 'Usuario no encontrado, recargue la página nuevamente', 'status' => 'warning'], 404); }

        if (count(User::user_by_email($req->email, $req->old_email))) { return response(['msg' => 'Este correo ya está siendo utilizado, use uno distinto', 'status' => 'error'], 400); }

        $img = $this->upload_file($req->file('photo'), 'img/users', true);

        $user->fullname = $req->fullname;
        $user->email = $req->email;
        $req->password = $req->password ? $user->password = bcrypt($req->password) : '';
        $img ? $user->photo = $img : '';
        $user->phone = $req->phone;

        $user->save();

        return response(['msg' => 'Usuario actualizado correctamente', 'status' => 'success'], 200);
    }

	/**
     * Display the terms and conditions and notice privacy.
     *
     * @return \Illuminate\Http\Response
     */
    public function legal_info()
    {
    	$data = Configuration::first();
        $data->setHidden(['id', 'created_at', 'updated_at']);
        return response(['msg' => 'Documentación legal enlistada', 'status' => 'ok', 'data' => $data], 200);
    }

    /**
     * Display the banners
     *
     * @return \Illuminate\Http\Response
     */
    public function banners()
    {
        $data = Banner::all();

        if (count($data)) {
            return response(['msg' => 'Banners enlistados a continuación', 'status' => 'ok', 'data' => $data], 200);
        }

        return response(['msg' => 'No hay banners por mostrar', 'status' => 'error'], 200);
    }

    /**
     * Display the faqs
     *
     * @return \Illuminate\Http\Response
     */
    public function faqs()
    {
        $data = Faq::all();

        if (count($data)) {
            return response(['msg' => 'Preguntas frecuentes enlistadas a continuación', 'status' => 'ok', 'data' => $data], 200);
        }

        return response(['msg' => 'No hay preguntas frecuentes por mostrar', 'status' => 'error'], 200);
    }
}
