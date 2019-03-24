<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies_token extends Model
{
    protected $fillable = [
        'movie', 'ip'
    ];
    public function movie()
    {
        return $this->belongsTo('App\Movies_view','movie','id')->first();
    }
}
