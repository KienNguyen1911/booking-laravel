<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Services\MailService;
use Illuminate\Support\Facades\DB;

// Use App\Services\BaseService;


class AuthController extends Controller
{
    //
    protected $authService;
    protected $mailService;

    public function __construct(AuthService $authService, MailService $mailService)
    {
        $this->authService = $authService;
        $this->mailService = $mailService;
    }

    public function login(LoginRequest $request)
    {
        if ($this->authService->login($request)) {
            return redirect()->route('index');
        } else {
            return redirect()->back()->withErrors('error', 'Invalid credentials');
        }
    }

    public function register(StoreUserRequest $request)
    {
        // dd($request->all());
        try {
            //code...
            DB::beginTransaction();
            $user = $this->authService->register($request);
            $this->mailService->mailRegister($user->email, $user->name, 'Successfully registered!!!');
            DB::commit();
            return redirect()->route('login');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect()->route('login');
    }
}
