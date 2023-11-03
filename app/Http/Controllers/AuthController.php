<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register()
    {
        $roles = Role::get();
        return view('authentication/register', compact('roles'));
    }

    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            // 'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();

        $user = User::create([
            'name' => $request->name,
            // 'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'Admin'
        ]);
        $user->assignRole([$request->role]);
        return redirect()->route('login');
    }

    public function login()
    {
        return view('authentication/login');
    }

    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            // 'username' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->boolean('remember'))) {

            $user = Auth::user();
            if ($user->status == 0) {
                Auth::logout();
                throw ValidationException::withMessages([
                    'email' => 'Your account is deactivated.'
                ]);
            }

            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        throw ValidationException::withMessages([
            'email' => trans('auth.failed')
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }

    public function profile()
    {
        return view('profile');
    }
}
