<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    //
    public function admin_login(LoginAdminRequest $request)
    {
        $validated = $request->validated();

        $admin = Admin::where("email", $validated["email"])->first();

        if ($admin && Hash::check($validated['password'], $admin->password)) {
            Auth::setUser($admin);
            $user = Auth::user();

            $token = $user->createToken('myToken')->accessToken;

            return response()->json(
                [
                    'data' => $user,
                    'token' => $token,
                    'message' => 'Successfully login',
                    'success' => true
                ],
                200
            );


        }

        return response()->json([
            'message' => 'Invalid credentials',
            'success' => false
        ], 400);
    }

    public function index(Request $request)
    {

    }

    public function admin_logout()
    {
        auth()->user()->token()->revoke();

        return response()->json([
            'message' => 'User logout',
            'success' => true,
        ]);
    }
}
