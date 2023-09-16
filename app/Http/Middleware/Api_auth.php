<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Api_auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $access_token=$request->header('Authorization');

        if($access_token !== null)
        {
            $user = User::where('access_token',"=",$access_token)->first();
            if($user !==null)
            {
                return $next($request);

            }else{
                return response()->json([
                    'message'=>"token not valid"
                ]);
            }

        }else{
            return response()->json([
                'message'=>"token not sent"
            ]);
        }
    }
}
