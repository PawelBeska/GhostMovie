<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie_token extends Model
{
    protected $fillable = [
        'movie', 'ip'
    ];
    public function movie()
    {
        return $this->belongsTo('App\Movie_view','movie','id')->first();
    }
}
