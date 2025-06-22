<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService) {}

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if ($this->authService->login($request->only('email', 'password'))) {
            return redirect()->route('books.index');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas.']);
    }

    public function logout(): RedirectResponse
    {
        $this->authService->logout();
        return redirect()->route('login');
    }
}
