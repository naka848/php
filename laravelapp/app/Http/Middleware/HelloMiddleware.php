<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
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
        $data =[
            ['name'=>'山田たろう','mail'=>'taro@yamada'],
            ['name'=>'田中はなこ','mail'=>'hanako@flowert'],
            ['name'=>'鈴木さちこ','mail'=>'sachiko@hguhu'],
           ];
           $request->merge(['data'=>$data]);
           return $next($request);
    }
}
