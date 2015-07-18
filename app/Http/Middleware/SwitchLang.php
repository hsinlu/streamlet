<?php

namespace App\Http\Middleware;

use Closure;

class SwitchLang
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
        $language = $request->server('HTTP_ACCEPT_LANGUAGE');
        if (starts_with($language, 'zh-CN')) {
            config(['app.locale' => 'zh-CN', 'timezone' => 'Asia/Shanghai']);
        }

        return $next($request);
    }
}
