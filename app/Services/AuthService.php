<?php

namespace App\Services;

use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService {
    private $user;
    
    public function __construct(User $user) {
        $this->user = $user;
    }
    public function getModel() {
        return $this->user;
    }

    public function login($request) {
        $email = $request->input('email');
        $password = $request->input('password');
        // $user = $this->user->where('email', $email)->first();
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $_SESSION['user'] = auth()->user();
            return true;
        }
        return false;
    }

    public function register($request) {
        $user = $this->user;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->save();
    }

    public function logout() {
        unset($_SESSION['user']);
    }

    public function user() {
        return $_SESSION['user'];
    }

    public function check() {
        return isset($_SESSION['user']);
    }


}