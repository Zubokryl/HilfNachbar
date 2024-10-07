<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Check if the response is an instance of Response
        if ($response instanceof Response) {
            $this->setCorsHeaders($response);
        }

        // Handle preflight request
        if ($request->getMethod() === 'OPTIONS') {
            $response = response()->json('OK', 200);
            $this->setCorsHeaders($response);
        }

        return $response;
    }

    /**
     * Set CORS headers.
     *
     * @param Response $response
     */
    private function setCorsHeaders(Response $response)
    {
        $allowedOrigins = env('CORS_ALLOWED_ORIGINS', 'http://127.0.0.1:8000');
        $response->headers->set('Access-Control-Allow-Origin', $allowedOrigins);
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }
}