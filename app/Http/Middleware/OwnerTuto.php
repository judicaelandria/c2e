<?php

namespace App\Http\Middleware;

use App\Tutoriel;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OwnerTuto
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            }
            return redirect()->guest('login');
        }
        else if(Tutoriel::find(Session::get('tutoriel'))->validation == null &&
            (Auth::user()->id == Tutoriel::find(Session::get('tutoriel'))->user->id || Auth::user()->type_utilisateur->terme == "admin")){
            return $next($request);
        }
        return back();
    }
}
