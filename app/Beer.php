<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'beers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['photo', 'title', 'description'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function styles()
    {
        return $this->hasMany('App\BeerStyle');
    }

    /**
     * Get the businesses that belongs to the beer.
     */
    public function businesses()
    {
        return $this->belongsToMany('App\Business');
    }
}
