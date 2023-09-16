<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ApiActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    
        $access_token=$request->header('Authorization');
        $useractive = User::where('access_token',"=",$access_token)->select('active')->first()['active'];
        if($useractive == 'yes')
        {
            return $next($request);

        }else{
            return response()->json([
                'message'=>"Account Not Active"
            ]);
        }

       
    }
}
