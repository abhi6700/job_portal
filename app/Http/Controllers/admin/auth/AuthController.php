<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard.index');
        }
        return view('admin.auth.login');
    }

    ## check login
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        
        if (Auth::guard('admin')->attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            $request->session()->regenerate();
 
            return redirect()->intended('/admin/dashboard');
        }
        return redirect()->route('admin.auth.login.index')
            ->withErrors(['error' => 'Invalid email or password!']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.auth.login.index');
    }
}
