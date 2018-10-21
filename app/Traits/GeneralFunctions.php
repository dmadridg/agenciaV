<?php

namespace App\Traits;

use Mail;
use Image;

use \App\User;
use \App\Singin;
use \App\Business;

use Illuminate\Support\Facades\File;

trait GeneralFunctions
{
	/**
     * Verify if a file is valid, then upload it to a given path.
     *
     * @return $name
     */
    public function upload_file($file, $path, $rename = false, $resize = false)
    {
        $extensions = array("1"=>"jpeg", "2"=>"jpg", "3"=>"png", "4"=>"gif");
        $name = '';

        if ($file) {
            $file_ext = $file->getClientOriginalExtension();
            if (array_search($file_ext, $extensions)) {
                if (!File::exists($path)) {
                    File::makeDirectory(public_path().'/'.$path, 0755, true, true);
                }

                $name = $rename ? $path.'/'.time().'.'.$file_ext : $path.'/'.$file->getClientOriginalName();

                if ($resize) {
                    $content = Image::make($file)
                    ->resize($resize['width'], $resize['height'])
                    ->save($name);
                } else {
                    $file->move($path, $name);
                }
                
                return $name;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    /**
     * Get a random string
     *
     * @return strtoupper($codigo)
     */
    public function get_random_code($size = 8)
    { 
        $code = '';
        $exist = [true];
        while (count($exist)) {
            $code = strtoupper(str_random($size));
            $exist = Business::where('code', $code)->get();
        }
        return $code;
    }

    /**
     * Send a notification to a single user or a group of users.
     *
     * @return $name
     */
    public function send_notification($type, $app_id, $app_key, $app_icon, $title, $content, $date, $time, $data, $users_id)
    {
        $player_ids = array();
        
        $header = array(
            "en" => $title
        );

        $msg = array(
            "en" => $content
        );
        
        $fields = array(
            'app_id' => $app_id,
            'data' => $data,
            'headings' => $header,
            'contents' => $msg,
            'large_icon' => $app_icon
        );

        if ($type == 1) {//General notification
            $fields['included_segments'] = array('All');
        } 

        else if ($type == 2) {//Individual notification
            foreach($users_id as $id) {
                $user = User::find($id);
                $player_ids [] = $user->player_id;
            }
            $fields['include_player_ids'] = $player_ids;
        }

        if ($date && $time) {
            $time_zone = $date.' '.$time;
            $time_zone = $this->summer ? $time_zone.' '.'UTC-0500' : $time_zone.' '.'UTC-0600';
            $fields['send_after'] = $time_zone;
        }

        $fields = json_encode($fields);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                   "Authorization: Basic $app_key"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }

    /*
    * Return boolean, true exito al enviar correo, false error al enviar correo
    *
    */
    public function f_mail($params)
    {
        $params['view'] = $params['view'] ? $params['view'] : 'mails.general';
        Mail::send($params['view'], ['content' => $params], function ($message) use($params)
        {
            $message->to($params['email']);
            $message->from(env('MAIL_USERNAME'), env('APP_NAME'));
            $message->subject(env('APP_NAME').' | '.$params['subject']);
        });
        if ( !Mail::failures() ){
            error_log('enviado');
            return true;
        }
        error_log('error_send: '.Mail::failures());
        return false;
    }

    /**
     * Register a new singin
     *
     */
    public function check_in($user_id)
    {
        $row = New Singin;

        $row->user_id = $user_id;
        $row->date_log = $this->actual_date;
        $row->date_time = $this->actual_datetime;
        
        $row->save();
    }
}
