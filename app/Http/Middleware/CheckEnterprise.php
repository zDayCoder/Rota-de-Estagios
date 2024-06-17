<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

class CheckEnterprise
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->user_type == \App\Models\User::TYPE_ENTERPRISE) {
            return $next($request);
        }

        throw new AuthorizationException('Acesso não autorizado.');
    }
}
