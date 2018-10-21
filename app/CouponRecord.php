<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponRecord extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'coupons_records';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['coupon_id', 'user_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
	
	/**
     * Get the coupon associated to the record.
     */
    public function coupon()
    {
        return $this->belongsTo('App\Coupon');
    }

    /**
     * Get the user associated to the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
