<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class AuthenticationController extends Controller
{
    public function doLogin(Request $request)
    {

        $data = $request->all();
        /** Validate Input from User */
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        /** Save Credentials  */
        $credentials = [
            'username' => $data['username'],
            'password' => $data['password']
        ];

        if (Auth::guard('admin')->attempt($credentials)) {

                $user = Auth::guard('admin')->user();
                if(Auth::guard('admin')->user()->status == 'active')
                {
                    // return redirect()->route('admin.dashboard');
                    echo "Authentication Successful";
                }
                else
                {
                    Auth::guard('admin')->logout();
                    Alert::warning('Your Account is Deactivated Please Contact Admin.');
                    return redirect()->back();
                }
        } else {
            // Authentication failed
            Alert::warning('User Credentials are wrong.');
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        Alert::success('Session Logged out');
        return redirect('/');
    }
}
