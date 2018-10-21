<?php

namespace App\Http\Controllers;

use \App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Show the main view.
     *
     */
    public function index(Request $req)
    {
        $title = $menu = "Comentarios";
        $comments = Comment::orderBy('id', 'desc')->where('status', 0)->get();

        foreach ($comments as $comment) {
            if (strlen($comment->content) > 30) {
                $comment->content_m = substr($comment->content, 0, 30).'...';
            }
            $comment->date = strftime('%d', strtotime($comment->created_at)).' de '.strftime('%B', strtotime($comment->created_at)).' del '.strftime('%Y', strtotime($comment->created_at));
        }

        if ($req->ajax()) {
            return view('comments.content', ['comments' => $comments]);
        }
        return view('comments.index', ['comments' => $comments, 'menu' => $menu , 'title' => $title]);
    }

    /**
     * Show the form for creating/editing a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($id = 0)
    {
        $title = "Formulario";
        $menu = "comentarios";
        $comment = null;
        if ($id) {
            $comment = Comment::find($id);
        }
        return view('comments.form', ['comment' => $comment, 'menu' => $menu, 'title' => $title]);
    }

    /**
     * Save a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $req)
    {
        $comment = New Comment;

        $img = $this->upload_file($req->file('photo'), 'img/commentos', true);

        $comment->title = $req->title;
        $comment->date = $req->date;
        $comment->description_short = $req->description_short;
        $comment->photo = $img;

        $comment->save();

        return response(['msg' => 'commento registrado correctamente', 'status' => 'success', 'url' => url('comentarios')], 200);
    }

    /**
     * Edit a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $comment = Comment::find($req->id);
        if (!$comment) { return response(['msg' =>'No se encontró el commento a editar', 'status' => 'error'], 404); }
        
        $img = $this->upload_file($req->file('photo'), 'img/comentarios', true);

        $comment->title = $req->title;
        $comment->date = $req->date;
        $comment->description_short = $req->description_short;
	    $img ? $comment->photo = $img : '';

	    $comment->save();
        
        return response(['msg' => 'commento actualizado correctamente', 'status' => 'success', 'url' => url('comentarios')], 200);
    }

    /**
     * Delete the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $req)
    {
        $msg = count($req->ids) > 1 ? 'los comentarios' : 'el comentario';
        $comments = Comment::whereIn('id', $req->ids)
        ->get();
        //->delete();
        //->update(['status' => $req->status]);

        if ($comments) {
            foreach ($comments as $comment) {
                File::delete(public_path($comment->photo));
                $comment->delete();
            }
            
            return response(['url' => url('comentarios'), 'status' => 'success' ,'msg' => 'Éxito eliminando '.$msg], 200);
        } else {
            return response(['msg' => 'Error al cambiar el status de '.$msg, 'status' => 'error', 'url' => url('comentarios')], 404);
        }
    }

    /**
     * Change the status of the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function change_status(Request $req)
    {
        $msg = count($req->ids) > 1 ? 'los comentarios' : 'el comentario';
        if ($req->change_to == 1) {
        	Comment::whereNotIn('id', $req->ids)->update(['status' => 0]);
        }
        
        $comments = Comment::whereIn('id', $req->ids)
        ->update(['status' => $req->change_to]);

        if ($comments) {
            return response(['url' => url('comentarios'), 'status' => 'success' ,'msg' => 'Éxito cambiando el status de '.$msg], 200);
        } else {
            return response(['msg' => 'Error al cambiar el status de '.$msg, 'status' => 'error', 'url' => url('comentarios')], 404);
        }
    }
}
