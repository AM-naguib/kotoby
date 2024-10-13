<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceHttps
{
public function handle(Request $request, Closure $next)
{
    // Check if the request is not secure (HTTP)
    if (!$request->isSecure()) {
        // Redirect to the same URL with HTTPS
        return redirect()->secure($request->getRequestUri());
    }

    return $next($request);
}
}
