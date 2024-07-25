<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    
    public function login(Request $request)
    {
        
        $credentials = $request->only('email', 'password');


        if(Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('tasks.index');
        }

        return redirect()->route('login')->withErrors(['error' => 'Unauthorized']);

    }

    /**
     * Log the admin out.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }

}
