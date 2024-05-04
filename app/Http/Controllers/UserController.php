<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Alert;

class UserController extends Controller
{
    public function index()
    {

        if (Auth::guard('admin')->check()) {
             return view('dashboard');
        } else {
            return route('homepage');
        }
    }
}
