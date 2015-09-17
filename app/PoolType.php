<?php

namespace Nhlpool;

use Illuminate\Database\Eloquent\Model;

class PoolType extends Model
{
    protected $fillable = ['name', 'created_by'];

    public function getRulesAttribute()
    {
        // SELECT COLUMN_JSON(rules) FROM pool_types WHERE id = 1;
        $rules = \DB::table('pool_types')
             ->select(\DB::raw('COLUMN_JSON(rules) AS rules'))
             ->where('id', '=', $this->id)
             ->get();
        return json_decode($rules[0]->rules);
    }

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

    /**
     * Transform a [key => value] array to a [key, value] array
     * @param  array $array key-value array
     * @return array key,value array
     */
    public static function flatten(array $array) : array
    {
        $return = [];
        array_walk_recursive($array, function($val, $key) use (&$return) {
            $return[] = $key;
            $return[] = $val;
        });
        return $return;
    }

    /**
     * [setRules description]
     * @param [type] $pool_type_id [description]
     * @param array  $rules        [description]
     */
    public function setRules(array $rules)
    {
        $pool_type_id = $this->id;
        $flatRules = static::flatten($rules);
        $stringRules = implode("','", $flatRules);
        // UPDATE pool_types SET rules = COLUMN_CREATE('color', 'blue', 'size', 'XL') WHERE id = 1;
        \DB::table('pool_types')
            ->where('id', '=', $pool_type_id)
            ->update(['rules' => \DB::raw("COLUMN_CREATE('$stringRules')")]);
    }
}
