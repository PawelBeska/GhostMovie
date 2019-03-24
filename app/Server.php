<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $fillable = ['name','ip','status'];
    public function status()
    {
        return $this->belongsTo('App\Statusserver','status','id')->first();
    }
}
