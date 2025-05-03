<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Middleware to validate the API key in incoming requests.
 */
class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * This middleware checks if the request contains a valid API key in the
     * 'X-API-KEY' header. If the key is invalid, it returns a 401 Unauthorized
     * response. Otherwise, it allows the request to proceed.
     *
     * @param  \Illuminate\Http\Request  $request  The incoming HTTP request.
     * @param  \Closure  $next  The next middleware or controller to handle the request.
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Retrieve the API key from the request header
        $apiKey = $request->header('X-API-KEY');

        // Retrieve the valid API key from the configuration
        $validKey = config('apikey.key'); // Defined in a config file or .env

        // Check if the provided API key is invalid
        if ($apiKey !== $validKey) {
            // Return a 401 Unauthorized response with an error message
            return response()->json([
                'message' => 'API Key inválida.', // 'Invalid API Key.'
            ], 401);
        }

        // Allow the request to proceed
        return $next($request);
    }
}
