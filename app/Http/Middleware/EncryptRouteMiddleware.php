<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Response;

class EncryptRouteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $request->path() = encrypt($request->path());
        $request->route()->setParameter("id", encrypt($request->route("id")));
        // $encrypted = encrypt($request->path());
        $encrypted = Crypt::encryptString($request->path());
        dd($encrypted);
        $request->merge(["path", $encrypted]);
        return $next($request); // envoyer la requête à la destination suivante
    }
}
