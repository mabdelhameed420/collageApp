<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Traits\GeneralTraits;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminToken
{
    use GeneralTraits;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = null;

        $user = Admin::where('id','==',$request->id);
        if (!$user){
            return $this->returnError("E3000", "not allowed to you");
        }else
            return $next($request);
    }
}
