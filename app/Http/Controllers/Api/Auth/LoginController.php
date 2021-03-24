<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\GeneralResponse;
use App\Http\Resources\TokenResource;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(LoginRequest $request)
    {

        if (Auth::attempt($request->validated())) {

            return new TokenResource(auth()->user());

        }

        return new ErrorResource('');

    }
}
