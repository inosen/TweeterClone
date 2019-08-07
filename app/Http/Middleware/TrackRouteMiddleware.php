<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Visit;
use App\User;

class TrackRouteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //Record a new route visit.
        $visit = new Visit();
        $visit->url = $request->fullUrl();
        $visit->user_id = $request->user()->id;
        $visit->save();

        return $next($request);
    }


}
