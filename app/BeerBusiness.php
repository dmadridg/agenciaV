<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeerBusiness extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'beers_businesses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['beer_id', 'business_id'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the beer of the relation.
     */
    public function beer()
    {
        return $this->hasOne('App\Beer', 'id', 'beer_id');
    }
}
