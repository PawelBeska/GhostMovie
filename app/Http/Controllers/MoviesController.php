<?php

namespace App\Http\Controllers;

use App\Http\Classes\FilmWeb;
use App\Movie;
use App\Movies_genre;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function movies()
    {


        return view('home.pages.movies.movies');
    }
    public function moviesAjax(Request $request)
    {
        if($request->ajax()) {
            $movies=null;
            if($request->get('title'))
            {
                $movies = Movie::where('title','LIKE','%'.$request->get('title').'%')->orWhere('original_title','LIKE','%'.$request->get('title').'%')->with('movies_genre');
            }
            if($request->get('genre'))
            {
                if($movies)
                    $movies->whereHas('movies_genre',function($query) use($request) {$query->where('name','=',$request->get('genre'));});
                else
                    $movies = Movie::whereHas('movies_genre',function($query) use($request) {$query->where('name','=',$request->get('genre'));})->with('movies_genre');
            }
            if($request->get('years_start')&&$request->get('years_end'))
            {
                if($movies)
                    $movies->where('year','<=',$request->get('years_end'))->where('year','>=',$request->get('years_start'));
                 else
                  $movies =   Movie::where('year','<=',$request->get('years_end'))->where('year','>=',$request->get('years_start'))->with('movies_genre');
            }
            if($movies) $v = $movies->paginate(12);
            else $v = Movie::select('id', 'title', 'year', 'poster', 'rating')->with(['movies_genre'])->paginate(12);

            $s = $v->jsonSerialize();
            array_push($s, (string)$v->render('home.elements.movies.moviesAjax'));
            return $s;
        }
        return   abort('403');
    }
    public function genresAjax(Request $request)
    {
        if($request->ajax()) {
            return Movies_genre::distinct('name')->pluck('name')->jsonSerialize();
        }
        return  abort('403');
    }
    public function createMovies()
    {
        foreach (FilmWeb::getMovies('mechanic') as $movie) {
            $created_movie = Movie::create([
                'title' => $movie->title,
                'original_title' => $movie->originalTitle,
                'poster' => $movie->imagePath,
                'year' => $movie->year,
                'premiere_world' => $movie->premiereWorld,
                'premiere_country' => $movie->premiereCountry,
                'rating' => $movie->avgRate,
                'duration' => $movie->duration,
                'country' => $movie->country,
                'description' => substr($movie->desciption, 0, 255)]);

            if (isset($movie->video->videoUrl))
                $created_movie->update(['video_url' => $movie->video->videoUrl]);
            if(isset($movie->genres))
            {
                $genres = explode(',',$movie->genres);
                foreach ($genres as $genre)
                {
                    Movies_genre::create(['name'=>$genre,'movie'=>$created_movie->id]);
                }
            }

        }
    }
}
