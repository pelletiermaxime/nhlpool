<?php

namespace Nhlpool;

use Illuminate\Database\Eloquent\Model;

class PoolType extends Model
{
    protected $fillable = ['name', 'rules', 'created_by'];

    /**
     * Get the pools for the pool type.
     */
    public function pools()
    {
        return $this->hasMany('Nhlpool\Pool');
    }

    /**
     * Get the user that owns the pool type.
     */
    public function user()
    {
        return $this->belongsTo('Nhlpool\User', 'created_by');
    }
}
