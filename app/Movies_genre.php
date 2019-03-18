<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies_genre extends Model
{
    protected $fillable = [ 'movie','name'
    ];
    public $timestamps = false;
    public function movies()
    {
        return  $this->hasOne('App\Movie','id','movie');
    }
}
