<?php

namespace App\Http\Middleware;
use App\Model\User;
use Closure;
class adminLogin
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
            return redirect('index');
        }
        else if (session('user')){
            $user= User::where('username',session('user'))->first();
            $type=$user->role;
            if ($type==0){
                echo '对不起，您不是管理员';
                return redirect('index');
            }
        }
        return $next($request);
    }
}
