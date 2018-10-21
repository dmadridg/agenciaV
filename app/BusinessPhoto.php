<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessPhoto extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'businesses_photos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['business_id', 'photo', 'size'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
	
	/**
     * Get the business associated to the business like.
     */
    public function business()
    {
        return $this->hasOne('App\Business', 'id', 'business_id');
    }
}
