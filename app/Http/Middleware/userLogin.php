<?php

namespace App\Http\Middleware;
use Closure;

class userLogin
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
        if (!session('user')){
            echo '请先登录！！';
            return redirect('index');
        }
        return $next($request);
    }
}
