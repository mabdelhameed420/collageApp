<?php

namespace App\Http\Middleware;

use App\Traits\GeneralTraits;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions as JWTExceptions;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckToken
{
    use GeneralTraits;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try{
            $user = JWTAuth::parseToken()->authenticate();
        }catch(\Exception $e){
            if($e instanceof JWTExceptions\TokenInvalidException){
                return $this->returnError('E3001','Invalid_Token');
            }elseif($e instanceof JWTExceptions\TokenExpiredException){
                return $this->returnError('E3001','Expire_Token');
            }else{
                return $this->returnError('E3001','Token_NotFound');
            }
        }catch(\Throwable $e){
            if($e instanceof JWTExceptions\TokenInvalidException){
                return $this->returnError('E3001','Invalid_Token');
            }elseif($e instanceof JWTExceptions\TokenExpiredException){
                return $this->returnError('E3001','Expire_Token');
            }else{
                return $this->returnError('E3001','Token_NotFound');
            }
        }

        if(!$user)
            return $this->returnError('E3000',trans('Unauthenticated'));
            
        return $next($request);
    }
}
