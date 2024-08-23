<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * Display the login form.
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Handle a login request.

     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirect to the intended page after login
            return to_route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    /**
     * Handle a logout request.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
