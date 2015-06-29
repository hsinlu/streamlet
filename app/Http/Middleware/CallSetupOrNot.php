<?php

namespace App\Http\Middleware;

use Closure;

class CallSetupOrNot
{
    protected $except = ['setup', 'setup/*', 'css/*', 'js/*', 'vendor/*', 'images/*', 'fonts/*'];

    function __construct()
    {
        // If debugbar enabled, add debugbar's route prefix to except rules
        if (config('debugbar.enabled')) {
            array_push($this->except, config('debugbar.route_prefix'), config('debugbar.route_prefix') . '/*');
        }
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$this->shouldPassThrough($request) && !file_exists(storage_path('app/steup.lock'))) {
            return redirect('setup');
        }

        return $next($request);
    }

    protected function shouldPassThrough($request)
    {
        foreach ($this->except as $except) {
            if ($request->is($except)) {
                return true;
            }
        }

        return false;
    }
}
