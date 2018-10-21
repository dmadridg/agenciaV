<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MultiController extends Controller
{
	/**
     * Upload files (images) to the server.
     *
     * @return ['uploaded'=>true]
     */
    public function upload_content(Request $req) 
    {
    	$file = $this->upload_file($req->file('file'), $req->path, $req->rename, false);

    	if ($file) {
            return response(['msg' => 'uploaded', 'status' => 'ok'], 200);
        }
        return response(['msg' => 'not uploaded', 'status' => 'error'], 200);
    }
}
