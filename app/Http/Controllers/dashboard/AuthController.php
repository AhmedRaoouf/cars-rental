<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Mail\forgotResponseMail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('dashboard.auth.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required','string','min:8']
        ]);

        $role= Role::where('name','admin')->select('id')->first()['id'];
        $user = User::where('role_id', $role)->where('email', $request->email)->first();


        if ($user == null) {
            $request->session()->flash('error-msg', 'invalid your email');
            return back();
        }else{
            $islogin = Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember);
        }
       
        if (!$islogin) {
            //flash session
            $request->session()->flash('error-msg', 'credentials not correct');
            return back();
        } else {
            $request->session()->flash('success-msg', 'You are login now');
            return redirect(url('/dashboard'));
        }
    }

    //  public function forget()
    // {
    //     return view('dashboard.auth.forget');
    // }

    // public function authPhone(Request $request)
    // {
    //     $request->validate([
    //         'email' => ['required', 'email'],
    //     ]);

    //     $user = User::where('email',$request->email)->first();
    //     if ($user) {
    //         $receiverMail = $request->email;
    //         $otp = random_int(1000, 9999);
    //         $user->update([
    //             'otp' => $otp,
    //         ]);

    //         Mail::to($receiverMail)->send(new forgotResponseMail($otp));

    //         return redirect(url('/reset_route'));
    //     } else {
    //         $request->session()->flash('error-msg', "Enter vaild Email Address");
    //         return back();
    //     }
    // }

    // public function reset_route(){
    //     return view('dashboard.auth.reset');
    // }

    // public function reset(Request $request)
    // {
    //     $request->validate([
    //         'otp' => 'required',
    //         'password' => 'required|min:8|confirmed',
    //     ]);
    //     $user = User::where('otp', $request->otp)->first();
    //     if ($user) {
    //         $user->update([
    //             'password' => Hash::make($request->password),
    //         ]); 
    //         return redirect(url('/'));
    //     }else{
    //         $request->session()->flash('error-msg', "uncorrect the otp code");
    //         return back();
    //     }
    // }

    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }
}
