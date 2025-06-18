<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ApiToken;
use Carbon\Carbon;

class CheckTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tokenValue = $request->bearerToken();

        $token = ApiToken::where('token', $tokenValue)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (! $token) {
            return response()->json(['message' => 'Unauthorized or token expired'], 401);
        }

        // Optionally set user info on request
        $request->merge(['token_user' => $token->user]);

        return $next($request);
    }
}
