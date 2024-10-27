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
            // return redirect()->intended('admin-index'); // Replace 'home' with your desired route
            return response()->json(['success'=>true,'message'=>'LoggedIn Successfully']);
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

    public function show_change_password(){
        return view('admin.change-password');
    }

    public function change_password(Request $request){
        $request->validate([
            'user_name' => 'required|string|max:255',
            'old_password' => 'required|string|min:4',
            'new_password' => 'required|string|min:4',
            'confirm_password' => 'required|string|same:new_password'
        ]);

        $user_name = $request->input('user_name');
        $old_password = $request->input('old_password');
        $new_password = $request->input('new_password'); 

        // Find the user by username
        $admin = Admin::where('user_name', $user_name)->first();

        // Check if the user exists and verify the old password
        if ($admin && Hash::check($old_password, $admin->password)) {
                $admin->update([
                'password' => Hash::make($new_password) // Hash the new password
            ]);

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return response()->json(['success' => true, 'message' => 'Password updated successfully!', 'logout' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid username or old password.'], 401);
        }
        
    }

}
