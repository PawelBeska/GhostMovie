<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies_file extends Model
{
    protected $fillable = ['id','size','remote','server','status','embed','author','remote_source','source','poster'];

    public function server()
    {
        return $this->belongsTo('App\Server','server','id')->first();
    }
    public function status()
    {
        return $this->belongsTo('App\Status_file','status','id')->first();
    }
    public function views()
    {
        return $this->hasMany('App\Movies_view',  'movie','id')->get();
    }
}
