<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RetrieveCartMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param
     */
    public function handle($request, Closure $next)
    {
//        if (Auth::guard('web')->check()) {
//            $user = auth()->user();
//            $user->load('cart'); // Load the cart relationship
//
//            // Make the cart available in the views
//            view()->share('cart', $user->cart);
//        }
        return $next($request);
    }
}
