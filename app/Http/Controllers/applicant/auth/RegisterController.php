<?php

namespace App\Http\Controllers\applicant\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\applicant\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('applicant.auth.register');
    }

     ## register new user
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        User::create($validated);
        Auth::login($user = User::where('email', $validated['email'])->first());
        return redirect()->route('applicant.vacancy.index');
    }  
}
