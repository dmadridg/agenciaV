<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subcategories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id', 'name', 'photo'];

    /**
     * Get the category related to the subcategory.
     *
     */
    public function category()
    {
        return $this->hasOne('App\Category');
    }
}
