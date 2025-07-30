<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\ThrottleRequestsException;

class LoginRateLimiter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only apply rate limiting to login attempts
        if ($request->routeIs('filament.admin.auth.login') && $request->isMethod('POST')) {
            $email = $request->input('email', '');
            $key = 'login_attempts:' . $email . '|' . $request->ip();
            
            // Check if too many attempts (5 attempts per minute)
            if (RateLimiter::tooManyAttempts($key, 5)) {
                $retryAfter = RateLimiter::availableIn($key);
                
                throw new ThrottleRequestsException(
                    'Terlalu banyak percobaan login. Silakan coba lagi dalam ' . $retryAfter . ' detik.',
                    null,
                    [
                        'Retry-After' => $retryAfter,
                        'X-RateLimit-Limit' => 5,
                        'X-RateLimit-Remaining' => 0,
                    ]
                );
            }
            
            // Hit the rate limiter for this attempt
            RateLimiter::hit($key, 60); // 60 seconds decay
        }
        
        return $next($request);
    }
}