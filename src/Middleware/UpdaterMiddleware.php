<?php

namespace Rollswan\LaravelProjectUpdater\Middleware;

use Closure;
use Rollswan\LaravelProjectUpdater\Helpers\ResponseHelper;

class UpdaterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // No published config file found
        if (!is_file(config_path('lpu.php'))) {
            return ResponseHelper::make(400, 'No publish lpu config file found.');
        }

        // Validate token
        if (empty(config('lpu.secret_token')) ||
            !$request->hasHeader(config('lpu.http_header')) ||
            $request->header(config('lpu.http_header')) !== config('lpu.secret_token')) {
            return ResponseHelper::make(403, 'Invalid token key.');
        }

        // Check config commands
        if (count(config('lpu.commands')) <= 0) {
            return ResponseHelper::make(422, 'Config commands is required.');
        }

        // We're done
        return $next($request);
    }
}
