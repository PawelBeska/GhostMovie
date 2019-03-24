<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies_view extends Model
{
    protected $fillable = [
        'movie', 'ip'
    ];
    public function movie()
    {
        return $this->belongsTo('App\Movies_file','movie','id')->first();
    }
}
