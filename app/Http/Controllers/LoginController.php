<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $token = $user->createToken("token");

        return ['token' => $token->plainTextToken, 'user' => $user];
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user !== null) {
            throw ValidationException::withMessages([
                'email' => ['This email adress is already in use.'],
            ]);
        } else {
            $user = User::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
        }
        $token = $user->createToken("token");

        return ['data' => ['token' => $token->plainTextToken, 'user' => $user]];
    }

    public function me()
    {
        //return "test";
        return Auth::user();
    }

    public function logout(Request $request)
    {
        
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
