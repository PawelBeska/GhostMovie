<?php
namespace App\Http\Classes\Evo;
use App\Http\Classes\Evo\Web\Web;
use Illuminate\Support\Facades\Facade;
class Evo extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'Evo';
    }
    public static function services($service,$url)
    {
        $class = "App\Http\Evo\Services\\$service";
        $service = new $class($url);
        return $service->source();
    }
    public static function web($site, $referer = 'https://google.pl/')
    {
        return new Web($site,$referer);
    }
}