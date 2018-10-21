<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'businesses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'user_id', 'category_id', 'subcategory_id', 'space_type', 'cover_photo', 'description_large', 'description_short', 'range_price', 'schedule', 'address', 'latitude', 'longitude', 'code', 'status', 'views', 'score'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    /**
     * Get the user associated to the business.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the category associated to the business.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the Subcategory associated to the business.
     */
    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }

    /**
     * Get the Subcategory associated to the business.
     */
    public function space()
    {
        return $this->hasOne('App\SpaceType', 'id', 'space_type_id');
    }

    /**
     * Get the beers that belongs to the business.
     */
    public function beers()
    {
        return $this->hasMany('App\BeerBusiness', 'business_id', 'id');
    }

    /**
     * Get the beers styles that belongs to the business.
     */
    public function beers_styles()
    {
        return $this->hasMany('App\BeerStyleBusiness', 'business_id', 'id');
    }

    /**
     * Get the BusinessData associated to the business.
     */
    public function data()
    {
        return $this->hasOne('App\BusinessData', 'business_id', 'id');
    }

    /**
     * Get the photos associated to the business.
     */
    public function photos()
    {
        return $this->hasMany('App\BusinessPhoto');
    }

    /**
     * Get the likes associated to the business.
     */
    public function likes()
    {
        return $this->hasMany('App\BusinessLike');
    }
}
