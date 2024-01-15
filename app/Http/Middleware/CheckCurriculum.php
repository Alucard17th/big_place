<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCurriculum
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if ($user && $user->curriculum->isNotEmpty() ) {
            return $next($request);
        }

        // Check if the current route is candidat.cvredirect
        if ($request->route()->getName() === 'candidat.cvredirect') {
            return $next($request);
        }

        // Redirect to a page indicating that the user needs to set up a curriculum
        return redirect()->route('candidat.cvredirect');
    }
}
