<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\WelcomeRegisterEmail;
use App\Models\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    use Notifiable;

    /**
     * Display the registration form.
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('register');
    }
    /**
     * @param \App\Http\Requests\RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);
        // Send welcome email
        Mail::to($user->email)->queue(new WelcomeRegisterEmail($user));
        Auth::login($user);

        return redirect()->route('home');
    }
}
