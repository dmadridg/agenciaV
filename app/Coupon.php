<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'coupons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['business_id', 'code', 'type', 'description', 'percentage'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    /**
     * Get the records of coupons used by customers.
     */
    public function records()
    {
        return $this->hasMany('App\CouponRecord', 'coupon_id', 'id');
    }
	
	/**
     * Get the business associated to the business like.
     */
    public function business()
    {
        return $this->belongsTo('App\Business');
    }
}
