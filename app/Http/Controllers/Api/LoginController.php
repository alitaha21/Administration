<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request) {
        if (!Auth::attempt($request->only(['email', 'password']))) { 
            return response(['message' => 'Invalid login credentials.']);
        }

        return response(['user' => Auth::user()]);
    }
}
