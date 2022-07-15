<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\LoginRequest;
use App\Http\Requests\User\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use App\Providers\RouteServiceProvider;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function register_process(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

            Auth::guard('web')->login($user);
            event(new Registered($user));

            return redirect(RouteServiceProvider::HOME);

    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login_process(LoginRequest $request)
    {
        $user = $request->validated();

        if (Auth::guard('web')->attempt($user)) {
            return view('home');
            //$request->session()->regenerate();
        }

        return  redirect('login')->withErrors(['email' => 'Пошта не знайдена']);
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        //$request->session()->invalidate();

        //$request->session()->regenerateToken();

        return redirect('/login');
    }
}
