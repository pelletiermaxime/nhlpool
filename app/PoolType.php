<?php

namespace Nhlpool;

use Illuminate\Database\Eloquent\Model;

class PoolType extends Model
{
    /**
     * Get the pools for the pool type.
     */
    public function pools()
    {
        return $this->hasMany('App\Pool');
    }
}
