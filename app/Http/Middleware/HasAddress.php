<?php
namespace App\Http\Middleware;

use Closure;

class HasAddress
{
    public function handle($request, Closure $next)
    {
         //Verifica se o usuário está autenticado e se tem um endereço associado
        if ($request->user() && !$request->user()->address) {
            return redirect()->route('address.create');
        }

        return $next($request);
    }
}
