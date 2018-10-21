<?php

namespace App\Http\Controllers;

use \App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventsController extends Controller
{
    /**
     * Show the main view.
     *
     */
    public function index(Request $req)
    {
        $title = $menu = "Eventos";
        $events = Event::orderBy('id', 'desc')->get();

        foreach ($events as $event) {
            if (strlen($event->description_short) > 150) {
                $event->description_short = substr($event->description_short, 0, 150).'...';
            }
            $event->date = strftime('%d', strtotime($event->date)).' de '.strftime('%B', strtotime($event->date)).' del '.strftime('%Y', strtotime($event->date));
        }

        if ($req->ajax()) {
            return view('events.content', ['events' => $events]);
        }
        return view('events.index', ['events' => $events, 'menu' => $menu , 'title' => $title]);
    }

    /**
     * Show the form for creating/editing a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($id = 0)
    {
        $title = "Formulario";
        $menu = "Eventos";
        $event = null;
        if ($id) {
            $event = Event::find($id);
        }
        return view('events.form', ['event' => $event, 'menu' => $menu, 'title' => $title]);
    }

    /**
     * Save a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $req)
    {
        $event = New Event;

        $img = $this->upload_file($req->file('photo'), 'img/eventos', true);

        $event->title = $req->title;
        $event->date = $req->date;
        $event->description_short = $req->description_short;
        $event->photo = $img;

        $event->save();

        return response(['msg' => 'Evento registrado correctamente', 'status' => 'success', 'url' => url('eventos-y-actividades')], 200);
    }

    /**
     * Edit a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $event = Event::find($req->id);
        if (!$event) { return response(['msg' =>'No se encontró el evento a editar', 'status' => 'error'], 404); }
        
        $img = $this->upload_file($req->file('photo'), 'img/eventos', true);

        $event->title = $req->title;
        $event->date = $req->date;
        $event->description_short = $req->description_short;
	    $img ? $event->photo = $img : '';

	    $event->save();
        
        return response(['msg' => 'Evento actualizado correctamente', 'status' => 'success', 'url' => url('eventos-y-actividades')], 200);
    }

    /**
     * Delete the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $req)
    {
        $msg = count($req->ids) > 1 ? 'los eventos' : 'el evento';
        $events = Event::whereIn('id', $req->ids)
        ->get();
        //->delete();
        //->update(['status' => $req->status]);

        if ($events) {
            foreach ($events as $event) {
                File::delete(public_path($event->photo));
                $event->delete();
            }
            
            return response(['url' => url('eventos-y-actividades'), 'status' => 'success' ,'msg' => 'Éxito eliminando '.$msg], 200);
        } else {
            return response(['msg' => 'Error al cambiar el status de '.$msg, 'status' => 'error', 'url' => url('eventos-y-actividades')], 404);
        }
    }

    /**
     * Change the status of the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function change_status(Request $req)
    {
        $msg = count($req->ids) > 1 ? 'los eventos' : 'el evento';
        if ($req->change_to == 1) {
        	Event::whereNotIn('id', $req->ids)->update(['status' => 0]);
        }
        
        $events = Event::whereIn('id', $req->ids)
        ->update(['status' => $req->change_to]);

        if ($events) {
            $data = ['url' => url('admin/eventos'), 'refresh' => 'table', 'user_id' => $this->current_user->id, 'status' => 'success' ,'msg' => 'Éxito cambiando el status de '.$msg];
            event(new PusherEvent($data));
            return response($data, 200);
        } else {
            return response(['msg' => 'Error al cambiar el status de '.$msg, 'status' => 'error', 'url' => url('admin/eventos')], 404);
        }
    }*/
}
