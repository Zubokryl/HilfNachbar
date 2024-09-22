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

        // Проверяем, что это объект ответа, чтобы безопасно добавить заголовки
        if ($response instanceof Response) {
            // Добавляем заголовки для CORS
            $response->headers->set('Access-Control-Allow-Origin', 'http://127.0.0.1:8000');
            $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        }

        // Обработка preflight-запроса
        if ($request->getMethod() === 'OPTIONS') {
            $response = response()->json('OK', 200);
            $response->headers->set('Access-Control-Allow-Origin', 'http://127.0.0.1:8000');
            $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        }

        return $response;
    }
}