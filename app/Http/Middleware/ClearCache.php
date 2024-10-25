<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClearCache
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  Request  $request
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the response from the next middleware
        $response = $next($request);

        // Set cache control headers
        $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate'); // HTTP 1.1.
        $response->headers->set('Pragma', 'no-cache'); // HTTP 1.0.
        $response->headers->set('Expires', '0'); // Proxies.

        return $response;
    }
}
