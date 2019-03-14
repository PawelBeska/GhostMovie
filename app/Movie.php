<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title','original_title','poster','year','premiere_world','premiere_country','video_url','rating','duration','country','description'
    ];
}
