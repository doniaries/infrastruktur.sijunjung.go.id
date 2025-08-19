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
     * The maximum number of attempts allowed.
     */
    protected $maxAttempts = 5;

    /**
     * The number of minutes to throttle for.
     */
    protected $decayMinutes = 1;

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only apply rate limiting to login attempts
        if ($this->shouldRateLimit($request)) {
            $key = $this->resolveRequestSignature($request);
            
            if (RateLimiter::tooManyAttempts($key, $this->maxAttempts)) {
                $seconds = RateLimiter::availableIn($key);
                
                throw new ThrottleRequestsException(
                    'Terlalu banyak percobaan login. Silakan coba lagi dalam ' . $seconds . ' detik.',
                    null,
                    $this->getHeaders($key, $this->maxAttempts, $this->calculateRemainingAttempts($key, $this->maxAttempts, $seconds)),
                    $seconds
                );
            }
            
            // Increment the login attempts
            RateLimiter::hit($key, $this->decayMinutes * 60);
        }
        
        return $next($request);
    }
    
    /**
     * Determine if the request should be rate limited.
     */
    protected function shouldRateLimit(Request $request): bool
    {
        return $request->routeIs('filament.admin.auth.login') && 
               $request->isMethod('POST') && 
               !$request->user('filament');
    }
    
    /**
     * Resolve request signature.
     */
    protected function resolveRequestSignature($request): string
    {
        return sha1(
            $request->method() .
            '|' . $request->server('SERVER_NAME') .
            '|' . $request->path() .
            '|' . $request->ip() .
            '|' . $request->input('email', '')
        );
    }
    
    /**
     * Get the rate limit headers.
     */
    protected function getHeaders($key, $maxAttempts, $remainingAttempts, $retryAfter = null): array
    {
        $headers = [
            'X-RateLimit-Limit' => $maxAttempts,
            'X-RateLimit-Remaining' => $remainingAttempts,
        ];

        if (!is_null($retryAfter)) {
            $headers['Retry-After'] = $retryAfter;
            $headers['X-RateLimit-Reset'] = now()->addSeconds($retryAfter)->getTimestamp();
        }

        return $headers;
    }
    
    /**
     * Calculate the number of remaining attempts.
     */
    protected function calculateRemainingAttempts($key, $maxAttempts, $retryAfter = null): int
    {
        return is_null($retryAfter) ? $maxAttempts - RateLimiter::attempts($key) : 0;
    }
}
