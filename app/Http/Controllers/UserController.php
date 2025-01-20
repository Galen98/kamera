<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        $data['title'] = 'Register';
        return view('user/register', $data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:tb_user',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }


    public function login()
    {
        $data['title'] = 'Login';
        return view('user/login', $data);
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    public function password()
    {
        $data['title'] = 'Change Password';
        return view('user/password', $data);
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password changed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function setting_view() {
        $data['title'] = 'Setting';
        $profile = Profiles::first(); 
        $data['data'] = $profile ? $profile->email : '';
        return view('options-view/index', $data);
    }

    public function setting_save_email(Request $request) {
        $datas = Profiles::all();
        if($datas->isEmpty()) {
        $data = [
            'email' => $request->email,
        ];
        
        $profile = Profiles::create($data);
        if ($profile) {
            return response()->json(['message' => 'Email saved successfully'], 201);
        } else {
            return response()->json(['message' => 'Failed to save email'], 500);
        }
    } else {
       $profile = Profiles::first();
       $profiles = $profile->update([
            'email' => $request->email
        ]);
        if ($profile) {
            return response()->json(['message' => 'Email saved successfully'], 201);
        } else {
            return response()->json(['message' => 'Failed to save email'], 500);
        }
    }
    }
}
