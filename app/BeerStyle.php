<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeerStyle extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'beers_styles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['beer_id', 'title', 'description'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    /**
     * Get the beer owner of the style.
     */
    public function beer()
    {
        return $this->hasOne('App\Beer', 'id', 'beer_id');
    }
}
