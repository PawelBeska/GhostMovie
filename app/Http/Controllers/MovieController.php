<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function movie($title,$id)
    {
        //return Movie::where('id',$id)->with('movies_genre')->first();

        return view('home.pages.movie.movie')->with('movie',Movie::where('id',$id)->with('movies_genre')->first());
    }
}
