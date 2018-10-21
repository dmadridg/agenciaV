<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpaceType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'spaces_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
