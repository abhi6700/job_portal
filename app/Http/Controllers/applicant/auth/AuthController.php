<?php

namespace App\Http\Controllers\applicant\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\applicant\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('applicant.vacancy.index');
        }
        return view('applicant.auth.login');
    }

    ## check login
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        
        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
        return redirect()->route('applicant.auth.login.index')
            ->withErrors(['error' => 'Invalid email or password!']);
    }

    ## logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('applicant.auth.login.index');
    }
}
