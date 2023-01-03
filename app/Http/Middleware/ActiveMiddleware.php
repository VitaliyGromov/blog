<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ActiveMiddleware
{
    private function isAtive(Request $request)
    {
        return true;
    }
    public function handle(Request $request, Closure $next)
    {
        if($this->isAtive($request)){
            return $next($request);
        }

        abort(403);
    }
}
