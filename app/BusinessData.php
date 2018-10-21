<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessData extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'businesses_data';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'business_id', 'category_id', 'subcategory_id', 'cover_photo', 'description_large', 'description_short', 'range_price', 'schedule', 'address', 'latitude', 'longitude', 'status'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    /**
     * Get the business associated to the business data.
     */
    public function business()
    {
        return $this->hasOne('App\Business', 'id', 'business_id');
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
        return $this->belongsToMany('App\Beer');
    }

    /**
     * Get the photos associated to the business.
     */
    public function photos()
    {
        return $this->hasMany('App\BusinessPhoto', 'business_id', 'business_id');
    }
}
