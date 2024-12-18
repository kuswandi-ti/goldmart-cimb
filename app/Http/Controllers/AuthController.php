<?php

namespace App\Http\Controllers;

use App\Models;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Mail\SendResetLinkMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthResetPasswordRequest;
use App\Http\Requests\AuthSendResetLinkRequest;

class AuthController extends Controller
{
    public function login()
    {
        Session::put('url.intended', URL::previous());

        if (!Auth::check()) {
            return view('auth.login');
        } else {
            // return redirect()->route('admin.dashboard.index');
            return Redirect::to(Session::get('url.intended'));
        }
    }

    public function handleLogin(AuthLoginRequest $request)
    {
        $request->authenticate();

        return redirect()->route('dashboard.index');
        // return Redirect::to(Session::get('url.intended'));
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(AuthSendResetLinkRequest $request)
    {
        $token = Str::random(64);

        $user = User::where('email', $request->email)->first();
        $user->remember_token = $token;
        $user->save();

        Mail::to($request->email)->send(new SendResetLinkMail($token, $request->email));

        return redirect()->back()->with('success', __('admin.A mail has been sent to your email address. Please check your email.'));
    }

    public function resetPassword($token)
    {
        return view('admin.auth.reset-password', compact('token'));
    }

    public function handleResetPassword(AdminAuthResetPasswordRequest $request)
    {
        $admin = User::where([
            'email' => $request->email,
            'remember_token' => $request->token,
        ])->first();

        if (!$admin) {
            return back()->with('error', __('admin.Token is invalid !'));
        }

        $admin->password = bcrypt($request->password);
        $admin->remember_token = null;
        $admin->save();

        return redirect()->route('admin.login')->with('success', __('admin.Password reset successfully. Please login first'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
