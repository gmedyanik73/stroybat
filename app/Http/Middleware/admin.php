<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class admin
{
  /**
   * Обработка входящего запроса.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
        if ( Auth::check() && Auth::user()->isAdmin()==true )
        {
            return $next($request);
        }
        return redirect('/');
  }
}
