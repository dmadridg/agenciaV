<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'image'];

    /**
     * Get the comments related to the user.
     */
    public function subcategories()
    {
        return $this->hasMany('App\Subcategory', 'id', 'category_id');
    }
}
