<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $validated = $request->validated();

        Auth::attempt($validated);

        $user = User::where('email', $validated['email'])->first();

        return response()->json([
            'access_token' => $user->createToken('auth-token')->plainTextToken,
        ]);
    }
}
