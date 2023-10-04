<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function doLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if (Auth::attempt($infologin)) {
            return redirect()->action([DashboardController::class, 'index'])->with('success', 'Login Success.');
        } else {
            return redirect('login')->with('error', 'Anda Penyusup.');
        }
    }

    public function register()
    {
        return view('admin.register');
    }

    public function doRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        User::create($data);

        return redirect('login')->with('success', 'Success make Account.');
    }

    function logout()
    {
        Auth::logout();

        return redirect('login')->with('success', 'Logout Success.');
    }
}
