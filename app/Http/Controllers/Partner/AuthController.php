<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\LoginRequest;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('partner.login');
    }

    public function login_process(\App\Http\Requests\Partner\Auth\LoginRequest $request)
    {

        $user = $request->validated();

        if (Auth::guard('partner')->attempt($user)) {
            return view('account');
            //$request->session()->regenerate();
        }

        return  redirect('partner/login')->withErrors(['email' => 'Пошта не знайдена']);
    }
}
