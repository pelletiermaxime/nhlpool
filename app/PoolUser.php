<?php

namespace Nhlpool;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Nhlpool\PoolType;

class PoolUser extends Model
{
    protected $table = 'pool_user';
    protected $fillable = [];

    public function getChoicesAttribute()
    {
        // SELECT COLUMN_JSON(choices) FROM pool_users WHERE id = 1;
        $choices = \DB::table('pool_user')
            ->select(\DB::raw('COLUMN_JSON(choices) AS choices'))
            ->where('pool_id', '=', $this->pool_id)
            ->where('user_id', '=', $this->user_id)
            ->get();
        return json_decode($choices[0]->choices, true);
    }

    public function setChoices(array $choices)
    {
        $flatChoices = PoolType::flatten($choices);
        $stringChoices = implode("','", $flatChoices);
        // UPDATE pool_users SET choices = COLUMN_CREATE('color', 'blue', 'size', 'XL') WHERE id = 1;
        \DB::table('pool_user')
            ->where('pool_id', '=', $this->pool_id)
            ->where('user_id', '=', $this->user_id)
            ->update(['choices' => \DB::raw("COLUMN_CREATE('$stringChoices')")]);
    }

    public function scopePool($query, $id)
    {
        return $query
            ->where('user_id', '=', Auth::user()->id)
            ->where('pool_id', '=', $id)
        ;
    }
}
