<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeerStyleBusiness extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'beers_styles_businesses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['beer_style_id', 'business_id'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the Subcategory associated to the business.
     */
    public function beer_style()
    {
        return $this->hasOne('App\BeerStyle', 'id', 'beer_style_id');
    }
}
