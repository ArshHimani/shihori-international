<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('admin.login');
    }

    public function checkLogin(Request $request){
        $credentials = $request->only('user_name', 'password');
        
        $admin = Admin::where('user_name', $credentials['user_name'])->first();
        
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            $request->session()->put('authenticated', true);
            return redirect()->intended('admin-index'); // Replace 'home' with your desired route
        }
        
        return redirect()->back()->withErrors(['Invalid credentials']);
    }

    public function logout(Request $request){
         // Invalidate the current session
    $request->session()->invalidate();

    // Regenerate CSRF token to prevent session fixation attacks
    $request->session()->regenerateToken();

    // Redirect to the login page
    return redirect()->route('login');
    }

}
