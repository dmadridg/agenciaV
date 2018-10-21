<?php

namespace App\Http\Controllers;

use \App\Post;
use \App\PostPhoto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{
	/**
     * Show the main view.
     *
     */
    public function index(Request $req)
    {
        $title = $menu = "Posts";
        $posts = Post::orderBy('id', 'desc')->get();

        foreach ($posts as $post) {
            if (strlen($post->content) > 150) {
                $post->content = substr($post->content, 0, 150).'...';
            }
            $post->date = strftime('%d', strtotime($post->date)).' de '.strftime('%B', strtotime($post->date)).' del '.strftime('%Y', strtotime($post->date));
        }

        if ($req->ajax()) {
            return view('posts.content', ['posts' => $posts]);
        }
        return view('posts.index', ['posts' => $posts, 'menu' => $menu , 'title' => $title]);
    }

    /**
     * Show the form for creating/editing a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($id = 0)
    {
        $title = "Formulario";
        $menu = "posts";
        $post = null;
        if ($id) {
            $post = Post::find($id);
        }

        return view('posts.form', ['post' => $post, 'menu' => $menu, 'title' => $title]);
    }

    /**
     * Save a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $req)
    {
        $post = New Post;

        $post->title = $req->title;
        $post->content = $req->content;
        $post->date = $req->date;
        $post->place = $req->place;
        $post->author = $req->author;

        $post->save();

        return response(['msg' => 'Post creado correctamente', 'url' => url('posts'), 'status' => 'success'], 200);
    }

    /**
     * Edit a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $post = Post::find($req->id);
        if ($post) {

	        $post->title = $req->title;
	        $post->content = $req->content;
	        $post->date = $req->date;
	        $post->place = $req->place;
	        $post->author = $req->author;

	        $post->save();

            return response(['msg' => 'Registro actualizado correctamente', 'url' => url('posts'), 'status' => 'success'], 200);
        }

	    return response(['msg' => 'No se encontró el registro a editar', 'status' => 'error', 'url' => url('posts')], 404);
    }

    /**
     * Upload files (images) to the server.
     *
     * @return ['uploaded'=>true]
     */
    public function upload_content(Request $req) 
    {
        $file = $this->upload_file($req->file('photo'), $req->path, $req->rename, false);

        if ($file) {
            $photo = New PostPhoto;

            $photo->post_id = $req->post_id;
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
        $photo = PostPhoto::find($req->photo_id);
        if ( $photo->delete() ){
            //File::delete(public_path($req->photo_name));
            return ['status' => true, 'msg' => 'Foto eliminada'];
        }
        return ['status' => false, 'msg' => 'Foto eliminada'];
    }

    /**
     * Change the status of the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $req)
    {
        $msg = count($req->ids) > 1 ? 'los posts' : 'el post';
        $posts = Post::whereIn('id', $req->ids)
        ->delete();
        //->update(['status' => $req->status]);

        if ($posts) {
            return response(['msg' => 'Éxito eliminando '.$msg, 'url' => url('posts'), 'status' => 'success'], 200);
        } else {
            return response(['msg' => 'Error al cambiar el status de '.$msg, 'status' => 'error', 'url' => url('posts')], 404);
        }
    }
}