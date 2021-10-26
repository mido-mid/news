<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class sendSponsorFooter
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
        $footer_sponsor = DB::table('sponsors')->where('type','footer')->first();

        View::composer(['layouts.app'], function($view) use ($footer_sponsor)
        {
            $view->with('footer_sponsor', $footer_sponsor);
        });

        return $next($request);
    }
}
