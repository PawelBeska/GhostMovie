<?php

namespace App\Http\Controllers;

class MoviesController extends Controller
{
    public function movies()
    {
        return view('home.pages.movies.movies');
    }
    public function moviesAjax()
    {

    }
}
