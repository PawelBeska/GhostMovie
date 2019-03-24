<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Routing\Route;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Original;
class CheckForMaintenanceMode extends Original
{
    /**
     * Handle an incoming request.
     *
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    protected $excludedRoutes = ['login'];
    public function handle($request, Closure $next)
    {
        $i=0;
        if($i) {
            if (Auth::user()) {
                return $next($request);
            } else {
                $response = $next($request);
                if (in_array($request->route()->uri(), $this->excludedRoutes)) {
                    return $response;
                }else{
                    return Response::make(view('maintenance'));
                }
            }
        }else{
            return $next($request);
        }
    }
}