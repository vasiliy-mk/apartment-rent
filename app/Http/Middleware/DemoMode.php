<?php

namespace App\Http\Middleware;

use Closure;

class DemoMode
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


        if($request->method()=='POST'){

            if (preg_match('/uploader/',$request->path(),$res)) exit();

            if (preg_match('/update|store|destroy|action|activate|password/',$request->path(),$res)) {
               return back()->with(
                   ['message-warning'=>'<b>'.trans('demo_mode.message').'</b>
                    <p>'.trans('demo_mode.input').':<pre>'.print_r($request->all(),1).'</pre></p>'
                   ]);
            }
        }

        return $next($request);
    }
}
