<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Services\AuthService;
// Use App\Services\BaseService;


class AuthController extends Controller
{
    //
    protected $authService;
    
    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    public function login(Request $request) {
        if ($this->authService->login($request)) {
            return redirect()->route('index');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function register(StoreUserRequest $request) {
        // dd($request->all());
        $this->authService->register($request);
        return redirect()->route('login');
    }

    public function logout() {
        $this->authService->logout();
        return view('auth.login');
    }
}
