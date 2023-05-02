<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param ...$roles
     * @return Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = auth()->user();

        foreach ($roles as $role) {
            if($user->hasRole($role))
                return $next($request);
        }

        abort(403, 'Forbidden');
    }
}
