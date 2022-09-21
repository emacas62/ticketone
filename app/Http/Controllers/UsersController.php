<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct() {
    }

    public function create(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:16',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'birthDate' => 'required|date',
            'city' => 'required|string',
        ]);

        $user = new User($request->all());
        $user->authToken = Str::random(60);
        $user->password = Hash::make($request->password);
        $user->save();

        return new UserResource($user);
    }

    public function login(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:16'
        ]);

        
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                return new UserResource($user);
            }
        }

        return $this->failure('The entered email or password are wrong!', 2, 422);
    }
}