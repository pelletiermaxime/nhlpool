<?php

namespace Nhlpool;

use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['start_date', 'end_date'];

    /**
     * The users that belong to the pool.
     */
    public function users()
    {
        return $this->belongsToMany('Nhlpool\User')->withTimestamps();
    }

    /**
     * Get the pool_type that owns the pool.
     */
    public function pool_type()
    {
        return $this->belongsTo('Nhlpool\PoolType');
    }
}
