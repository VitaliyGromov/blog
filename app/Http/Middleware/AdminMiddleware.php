<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    private function isAdmin(Request $request)
    {
        return true;
    }
    public function handle(Request $request, Closure $next)
    {
        if($this->isAdmin($request)){
            return $next($request);
        }

        abort(403);
    }
}
