<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Models\StudentAffair;
use App\Traits\GeneralTraits;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckStudeetAffairToken
{
    use GeneralTraits;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        

        $user = StudentAffair::select('id')->where('id' == $request->admin_id);
        if ($user == null)
            return $this->returnError("E3000", "not allowed to you");
        else
            return $next($request);
    }
}
