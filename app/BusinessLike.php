<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessLike extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'businesses_likes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'business_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    /**
     * Get the user associated to the business like.
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }

    /**
     * Get the business associated to the business like.
     */
    public function business()
    {
        return $this->hasOne('App\Business', 'id', 'business_id');
    }
}
