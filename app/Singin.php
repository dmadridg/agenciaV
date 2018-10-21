<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singin extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sing_ins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'date_log', 'date_time'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
