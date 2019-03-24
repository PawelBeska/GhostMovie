<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status_server extends Model
{
    public function servers()
    {
        return $this->hasMany('App\Server',  'status','id')->get();
    }
    public static function statuses($status)
    {
        $statuses = [
            'turned_off'=>1,
            'turned_on'=>2,
            'out_of_space'=>3
        ];
        if(isset($statuses[$status]))
        {
            return $statuses[$status];
        }else
        {
            error_log('Brak statusu o takim id!');
        }
    }
}
