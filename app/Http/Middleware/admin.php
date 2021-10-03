<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class admin
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
        $user = auth()->user();

        if($user->type == "admin"){
            return $next($request);
        }
        return redirect()->route('admin-news.create')->withStatus('ليس مسموح لك بدخول هذه الصفحة');

    }
}
