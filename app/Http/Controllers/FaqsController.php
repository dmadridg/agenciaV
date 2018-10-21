<?php

namespace App\Http\Controllers;

use \App\Faq;
use \App\Events\PusherEvent;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
	/**
     * Show the main view.
     *
     */
    public function index(Request $req)
    {
        $title = $menu = "Faqs";
        $faqs = Faq::orderBy('id', 'desc')->get();

        if ($req->ajax()) {
            return view('faqs.table', ['faqs' => $faqs]);
        }
        return view('faqs.index', ['faqs' => $faqs, 'menu' => $menu , 'title' => $title]);
    }

    /**
     * Show the form for creating/editing a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($id = 0)
    {
        $title = "Formulario";
        $menu = "Faqs";
        $faq = null;
        if ($id) {
            $faq = Faq::find($id);
        }
        return view('faqs.form', ['faq' => $faq, 'menu' => $menu, 'title' => $title]);
    }

    /**
     * Save a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $req)
    {
        $faq = New Faq;

        $faq->question = $req->question;
        $faq->answer = $req->answer;

        $faq->save();

        return response(['msg' => 'Nueva pregunta frecuente registrada correctamente', 'url' => url('faqs'), 'status' => 'success'], 200);
    }

    /**
     * Edit a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $faq = Faq::find($req->id);
        if ($faq) {

	        $faq->question = $req->question;
	        $faq->answer = $req->answer;

	        $faq->save();

            return response(['msg' => 'Registro actualizado correctamente', 'url' => url('faqs'), 'status' => 'success'], 200);
        }

	    return response(['msg' => 'No se encontró el registro a editar', 'status' => 'error', 'url' => url('faqs')], 404);
    }

    /**
     * Change the status of the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $req)
    {
        $msg = count($req->ids) > 1 ? 'las preguntas' : 'la pregunta';
        $faqs = Faq::whereIn('id', $req->ids)
        ->delete();
        //->update(['status' => $req->status]);

        if ($faqs) {
            return response(['msg' => 'Éxito eliminando '.$msg, 'url' => url('faqs'), 'status' => 'success'], 200);
        } else {
            return response(['msg' => 'Error al cambiar el status de '.$msg, 'status' => 'error', 'url' => url('faqs')], 404);
        }
    }
}
