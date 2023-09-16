<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiBorrower
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $access_token = $request->header('Authorization');
        $user = User::where('access_token', "=", $access_token)->first();
        $user_role = Role::where('id', $user->role_id)->first()['name'];
        if ($user_role == 'borrower') {
            return $next($request);
        }
        return response()->json([
            'message' => "You are not Borrower Now. Please Switch the account to Borrower so that you show Your borrowings cars"
        ]);
    }
}
