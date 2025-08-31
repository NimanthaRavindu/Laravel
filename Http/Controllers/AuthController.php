<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\View\view;

class AuthController extends Controller
{
      public function index()
            {
                // Show login form
                return view('auth.index');  // This loads resources/views/auth/index.blade.php
            }
 // Show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = DB::table('users')->where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user_id', $user->id);
            Session::put('username', $user->username);
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['username' => 'Invalid credentials']);
        }
    }

    // Show signup form
    public function showSignup()
    {
        return view('auth.signup');
    }

    // Handle signup
    public function signup(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6|confirmed'
        ]);

        $userId = DB::table('users')->insertGetId([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Session::put('user_id', $userId);
        Session::put('username', $request->username);
        return redirect()->route('dashboard');
    }

    // Handle logout
    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }

    // Stub: Google OAuth
    public function redirectToGoogle()
    {
        // Implement with Socialite if needed
        return redirect()->route('dashboard');
    }

    public function handleGoogleCallback()
    {
        // Implement Google callback logic here
        return redirect()->route('dashboard');
    }

    // Stub: PlayStore OAuth
    public function redirectToPlayStore()
    {
        // Implement as needed
        return redirect()->route('dashboard');
    }

    public function handlePlayStoreCallback()
    {
        // Implement PlayStore callback logic here
        return redirect()->route('dashboard');
    }

}
?>