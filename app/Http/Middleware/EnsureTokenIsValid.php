<?php

namespace App\Http\Middleware;

use App\Models\ApiUser;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->get('token');
        $apiUser = ApiUser::query()->where('token', $token)->where('active', true)->get()->first();

        if (!$apiUser) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token is not exists or is inactive',
                'code' => 'err'
            ]);
        }

        return $next($request);
    }
}
