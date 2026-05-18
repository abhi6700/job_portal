<?php

namespace App\Http\Controllers\company\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\company\auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::guard('company')->check()) {
            return redirect()->route('company.dashboard.index');
        }
        return view('company.auth.login');
    }

    ## check login
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        
        if (Auth::guard('company')->attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            $request->session()->regenerate();
 
            return redirect()->intended('/company/dashboard');
        }
        return redirect()->route('company.auth.login.index')
            ->withErrors(['error' => 'Invalid email or password!']);
    }

    public function logout(Request $request)
    {
        Auth::guard('company')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('company.auth.login.index');
    }
}
