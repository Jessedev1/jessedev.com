<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class AllowBackForwardCacheMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $cacheControl = $response->headers->get('Cache-Control');
        $isBfcacheBlock = $cacheControl && str_contains($cacheControl, 'no-store');

        if ($isBfcacheBlock && $response->headers->get('Pragma') === 'no-cache') {
            $response->headers->remove('Pragma');
            $response->headers->remove('Expires');
            $response->headers->remove('Cache-Control');
        }

        return $response;
    }
}
