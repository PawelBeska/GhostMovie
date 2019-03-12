<?php
namespace App\Http\Classes;
use App\Http\Classes\Evo\Evo;
class FilmWeb
{

    /**
     * Funkcja odpowiedzialna za pobranie informacji o filmie.
     * @param string $title
     * @return array
     */
    public static function getMovie($title)
    {

            $para = explode('\af',substr(Evo::web('https://www.filmweb.pl/search/live?q='.urlencode($title))->getSiteContent(),1));
            $para[0] =  explode('\c',$para[0]);
            $para[0][0]= 'https://www.filmweb.pl/film/'.urlencode($para[0][5].'-'.$para[0][6].'-'.$para[0][1]);
            return \nSolutions\Filmweb::instance()->getFilmInfoFull($para[0][1])->execute();

    }
    /**
     * Funkcja odpowiedzialna za pobranie informacji o filmach.
     * @param string $title
     * @return array
     */
    public static function getMovies($title)
    {
        $para = explode('\af',substr(Evo::web('https://www.filmweb.pl/search/live?q='.urlencode($title))->getSiteContent(),1));
        for($x=0;$x<count($para);$x++)
        {
            $para[$x] =  explode('\c',$para[$x]);
            $para[$x][0]= 'https://www.filmweb.pl/film/'.urlencode($para[$x][5].'-'.$para[$x][6].'-'.$para[$x][1]);
        }
        return $para;
    }
}