<?php

namespace App\Http\Middleware;

use Closure;
use App\Settings;

class SettingsCache
{
    /**
     * Removes Cache when settings or pages(for navbar menu) are changed
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (preg_match('/page|settings\/[update|store|destroy|action|activate|sort]/',$request->path(),$res)) {
            Settings::removeCache();
        }
        return $next($request);
    }
}
