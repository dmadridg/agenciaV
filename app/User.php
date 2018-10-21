<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'email', 'password', 'remember_token', 'photo', 'phone', 'social_network', 'role_id', 'player_id', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the rol of the current user.
     *
     */
    public function role()
    {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }

    /**
     * Get the business related to the user.
     */
    public function business()
    {
        return $this->hasOne('App\Business', 'user_id', 'id');
    }

    /**
     * Get the comments related to the user.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'user_id', 'id');
    }

    /**
     * Check the role of the current user.
     *
     */
    public function checkRole($roles)
    {
        foreach ($roles as $role) {
            if ($this->role->name == $role) {
                return true;
            }
        }
        return false;
    }

    /**
     * Search an user by his email.
     *
     */
    public static function user_by_email($email, $old_email = false)
    {
        $query = User::where('email', '=', $email);

        $query = $old_email ? $query->where('email', '!=', $old_email)->get() : $query->get();
        
        return $query;
    }

    /**
     * Search an user by his id.
     */
    public static function user_by_id($id)
    {
        return User::where('id', $id)->first();
    }
}
