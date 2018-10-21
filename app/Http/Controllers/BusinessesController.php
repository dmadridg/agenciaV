<?php

namespace App\Http\Controllers;

use \App\User;
use \App\Beer;
use \App\Category;
use \App\Business;
use \App\BeerStyle;
use \App\SpaceType;
use \App\Subcategory;
use \App\BusinessData;
use \App\BeerBusiness;
use \App\BusinessPhoto;
use \App\BeerStyleBusiness;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BusinessesController extends Controller
{
	/**
     * Show the main view.
     *
     */
    public function index(Request $req)
    {
        $title = "Lista de comercios";
        $menu = "Comercios";
        $comercios = Business::orderBy('id', 'desc')->where('status', '!=', 2)->get();
        $spaces = SpaceType::all();

        if ($req->ajax()) {
            return view('businesses.content', ['comercios' => $comercios]);
        }

        return view('businesses.index', ['comercios' => $comercios, 'spaces' => $spaces, 'menu' => $menu , 'title' => $title]);
    }

    /**
     * Show the main view.
     *
     */
    public function validate_data(Request $req)
    {
        $title = "Validar comercios";
        $menu = "Comercios";
        $comercios = Business::orderBy('id', 'desc')->whereHas('data', function($query){
            $query->where('status', 0);
        })
        ->where('status', '!=', 2)
        ->get();

        if ($req->ajax()) {
            return view('businesses_validate.content', ['comercios' => $comercios]);
        }

        return view('businesses_validate.index', ['comercios' => $comercios, 'menu' => $menu , 'title' => $title]);
    }

    /**
     * Show the form for creating/editing a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($id = 0)
    {
        $title = "Formulario";
        $menu = "Comercios";
        $comercio = null;
        if ($id) {
            $comercio = Business::find($id);
        }

        return view('businesses.form', ['comercio' => $comercio, 'menu' => $menu, 'title' => $title]);
    }

    /**
     * Save a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $req)
    {
        $comercio = New Business;

        $comercio->title = $req->title;
        $comercio->content = $req->content;
        $comercio->date = $req->date;
        $comercio->place = $req->place;
        $comercio->author = $req->author;

        $comercio->save();

        return response(['msg' => 'Post creado correctamente', 'url' => url('comercios'), 'status' => 'success'], 200);
    }

    /**
     * Edit a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $comercio = Business::find($req->id);
        if ($comercio) {

	        $comercio->space_type_id = $req->space_type_id;

	        $comercio->save();

            return response(['msg' => 'Registro actualizado correctamente', 'url' => url('comercios'), 'status' => 'success'], 200);
        }

	    return response(['msg' => 'No se encontró el registro a editar', 'status' => 'error', 'url' => url('comercios')], 404);
    }

    /**
     * Show the actual info from an business.
     *
     */
    public function show_business_info(request $req)
    {
        $data = Business::find($req->id);

        if (!$data) {
            return response(['status' => 'error', 'msg' => 'Comercio no encontrado'], 404);
        }
        $data->photos;
        $data->category_name = $data->category ? $data->category->name : '';
        $data->subcategory_name = $data->subcategory ? $data->subcategory->name : '';
        $data->space_type_name = $data->space->name;
        $data->user_name = $data->user->fullname;
        $data->user_email = $data->user->email;
        $data->user_phone = $data->user->phone;
        /*foreach($data->beers_styles as $style){
            $style->beer;
        }*/
        $styles =  BeerStyleBusiness::where('business_id', $data->id)->get();
        foreach ($styles as $style) {
            $style->beer_style->beer;
        }
        $data->b_beers_style = $styles;
        $data->status_name = ($data->status == 0 ? 'Inhabilitado' : ($data->status == 1 ? 'Habilitado' : 'Eliminado'));

        return $data;
    }

    /**
     * Show the data for approve to the business.
     *
     */
    public function show_business_data(request $req)
    {
        $data = BusinessData::find($req->id);

        if (!$data) {
            return response(['status' => 'error', 'msg' => 'Servicio no encontrado'], 404);
        }

        $data->photos;
        $data->category_name = $data->category ? $data->category->name : '';
        $data->subcategory_name = $data->subcategory ? $data->subcategory->name : '';
        $data->user_img = $data->business->user->photo;
        $data->user_name = $data->business->user->fullname;
        $data->user_email = $data->business->user->email;
        $data->user_phone = $data->business->user->phone;
        return $data;
    }

    /**
     * Upload files (images) to the server.
     *
     * @return ['uploaded'=>true]
     */
    public function upload_content(Request $req) 
    {
        $path = $req->path.'/'.$req->business_id;
        $file = $this->upload_file($req->file('photo'), $path, $req->rename, false);

        if ($file) {
            $photo = New BusinessPhoto;

            $photo->business_id = $req->business_id;
            $photo->photo = $file;
            $photo->size = $req->file('photo')->getClientSize();

            $photo->save();

            return response(['msg' => 'uploaded', 'status' => 'ok'], 200);
        }
        return response(['msg' => 'not uploaded', 'status' => 'error'], 200);
    }

    /**
     * Delete post file.
     *
     */
    public function delete_content(Request $req) 
    {
        $photo = BusinessPhoto::find($req->photo_id);
        if ( $photo->delete() ){
            //File::delete(public_path($req->photo_name));
            return ['status' => true, 'msg' => 'Foto eliminada'];
        }
        return ['status' => false, 'msg' => 'Foto eliminada'];
    }

    /**
     * Change the status of the specified resource. (business)
     *
     * @return \Illuminate\Http\Response
     */
    public function change_business_status(Request $req)
    {
        $msg = count($req->ids) > 1 ? 'los comercios' : 'el comercio';
        $comercios = Business::whereIn('id', $req->ids)
        ->update(['status' => $req->change_to]);

        if ($comercios) {
            return response(['msg' => 'Éxito modificando el status de '.$msg, 'url' => url('comercios'), 'status' => 'success'], 200);
        } else {
            return response(['msg' => 'Error al cambiar el status de '.$msg, 'status' => 'error', 'url' => url('comercios')], 404);
        }
    }

    /**
     * Approve or reject data about a business. (business data)
     *
     * @return \Illuminate\Http\Response
     */
    public function change_data_business_status(Request $req)
    {
        $data = BusinessData::find($req->id);

        if (!$data) { return response(['msg' => 'Error al cambiar el status del comercio', 'status' => 'error'], 404); }
        
        $data->status = $req->change_to;
        $data->comment = $req->comment;
        
        $data->save();

        if ($req->change_to == 1) {//Update business
            $comercio = Business::find($data->business_id);

            $comercio->name = $data->name;
            $comercio->category_id = $data->category_id;
            $comercio->subcategory_id = $data->subcategory_id;
            $comercio->logo = $data->logo;
            $comercio->cover_photo = $data->cover_photo;
            $comercio->description_large = $data->description_large;
            $comercio->description_short = $data->description_short;
            $comercio->range_price = $data->range_price;
            $comercio->schedule = $data->schedule;
            $comercio->address = $data->address;
            $comercio->latitude = $data->latitude;
            $comercio->longitude = $data->longitude;

            $comercio->save();
        }
        return response(['msg' => 'Éxito modificando el status del comercio', 'url' => url('comercios/validaciones'), 'status' => 'success'], 200);
        //Add code to replace business data
    }

    /**
     *========================================================================================================================================
     *=                                     Empiezan las funciones relacionadas al módulo de mi comercio                                     =
     *========================================================================================================================================
     */

    /**
     * Show the main view.
     *
     */
    public function index_ecomerce(Request $req)
    {
        $title = $menu = "Mi comercio";
        $aux = [];
        $beers = Beer::all();
        $styles = $all_styles = BeerStyle::all();
        $comercio = Business::where('user_id', $this->current_user->id)->first();
        $categories = Category::all();
        $subcategories = Subcategory::where('category_id', $comercio->category_id)->get();
        $all_subs = Subcategory::all();

        if ($comercio->beers->count()) {
            foreach($comercio->beers as $st) {
                $aux[] = $st->beer->id;
            }

            $styles = BeerStyle::whereIn('beer_id', $aux)->get();
        }
        /*if ($req->ajax()) {
            return view('businesses.content', ['comercio' => $comercio]);
        }*/

        return view('my-business.index', compact('comercio', 'categories', 'subcategories', 'all_subs', 'beers', 'styles', 'all_styles', 'menu', 'title'));
    }

    /**
     * Update the ecommerce data.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_business(Request $req)
    {
        $data = BusinessData::find($req->id);

        if (!$data) { return response(['msg' => 'Datos del negocio no encontrado, recargue la página nuevamente', 'status' => 'warning'], 404); }

        $logo = $this->upload_file($req->file('logo'), 'img/comercios/'.$data->business_id.'/logo', true);
        $cover = $this->upload_file($req->file('cover_photo'), 'img/comercios/'.$data->business_id.'/cover', true);

        $data->name = $req->name;
        $data->category_id = $req->category_id;
        $data->subcategory_id = $req->subcategory_id;
        $logo ? $data->logo = $logo : '';
        $cover ? $data->cover_photo = $cover : '';
        $data->description_large = $req->description_large;
        $data->description_short = $req->description_short;
        $data->range_price = $req->range_price;
        $data->schedule = $req->schedule;
        $data->address = $req->address;
        $data->latitude = $req->latitude;
        $data->longitude = $req->longitude;
        $data->status = 0;//Always will change to approval
        
        $data->save();
        
        return response(['msg' => 'Se han enviado a revisar estos datos', 'status' => 'success', 'url' => url('mi-comercio/load-my-busines')], 200);
    }

    /**
     * Update the ecommerce user.
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

        return response(['msg' => 'Usuario actualizado correctamente', 'status' => 'success', 'url' => url('mi-comercio/load-my-busines')], 200);
    }

    /**
     * Update the beers for an ecommerce.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_beers(Request $req)
    {
        $business = Business::find($req->id);

        if (!$business) { return response(['msg' => 'Comercio no encontrado', 'status' => 'error'], 404); }

        foreach($business->beers as $beer) { $beer->delete(); }
        foreach($business->beers_styles as $style) { $style->delete(); }

        foreach ($req->beers_ids as $beer_id) {
            $n_beer = New BeerBusiness;
            $n_beer->beer_id = $beer_id;
            $n_beer->business_id = $business->id;
            $n_beer->save();
        }

        foreach ($req->beers_styles_ids as $style_id) {
            $n_beer = New BeerStyleBusiness;
            $n_beer->beer_style_id = $style_id;
            $n_beer->business_id = $business->id;
            $n_beer->save();
        }

        return response(['msg' => 'Cervezas modificadas exitosamente', 'status' => 'success'], 200);
    }

    /**
     * Update the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function load_my_business(Request $req)
    {
        //$user = null;
        $comercio = Business::where('user_id', $this->current_user->id)->first();

        if ($req->ajax()) {
            //$user = User::find($this->current_user->id);
            return view('my-business.card', ['comercio' => $comercio]);
        }
    }
}
