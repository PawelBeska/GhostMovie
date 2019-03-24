<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie_view extends Model
{
    protected $fillable = [
        'movie', 'ip'
    ];
    public function movie()
    {
        return $this->belongsTo('App\Movie_file','movie','id')->first();
    }
}
