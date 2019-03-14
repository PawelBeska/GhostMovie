<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Classes\FilmWeb;
use App\Movie;
use App\Movies_genre;

class MoviesController extends Controller
{
    public function movies()
    {
        return view('home.pages.movies.movies');
    }
    public function moviesAjax()
    {
        foreach (FilmWeb::getMovies('iron') as $movie) {
            $created_movie = Movie::create([
                'title' => $movie->title,
                'original_title' => $movie->originalTitle,
                'poster' => $movie->imagePath,
                'year' => $movie->year,
                'premiere_world' => $movie->premiereWorld,
                'premiere_country' => $movie->premiereCountry,
                'rating' => $movie->avgRate,
                'duration' => $movie->duration,
                'country' => $movie->premiereCountry,
                'description' => substr($movie->desciption, 0, 255)]);

            if (isset($movie->video->videoUrl))
                $created_movie->update(['video_url' => $movie->video->videoUrl]);
        }
    }
}
