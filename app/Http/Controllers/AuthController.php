<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);
        $fields['password'] = bcrypt($fields['password']);

        $user = User::create(
            $fields
        );

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
    public function logout(Request $request)
    {

        // Revoke the token that was used to authenticate the current request...
        $request->user()->currentAccessToken()->delete();

        return [
            'message' => 'Logged Out'
        ];
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if (auth()->attempt($fields)) {
            return response(
                [
                    'message' => 'Logged In'
                ],
                200
            );
        } else {
            return response(
                [
                    'message' => 'Bad Credentials'
                ],
                401
            );
        }

        $user = User::where('email', $fields['email'])->first();

        // if (!$user || !Hash::check($fields['password'], $user->password)) {

        //     return response(
        //         [
        //             'message' => 'Bad Credentials'
        //         ],
        //         401
        //     );
        // }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
}
