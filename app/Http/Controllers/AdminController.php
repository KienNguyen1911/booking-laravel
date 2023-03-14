<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }

    public function tables()
    {
        return view('admin.pages.tables');
    }

    public function billing()
    {
        return view('admin.pages.billing');
    }

    public function profile()
    {
        return view('admin.pages.profile');
    }

    
}
