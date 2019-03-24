<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function permissions()
    {
        return $this->hasMany('App\Permission',  'group','id')->get();
    }
    public static function groups($status)
    {
        $statuses = [
            'admin'=>3,
            'moderator'=>2,
            'user'=>1,
            'partner'=>4];
        if(isset($statuses[$status]))
        {
            return $statuses[$status];
        }else
        {
            return false;
        }
    }
}
