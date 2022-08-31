<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ImageManager;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * @throws Exception
     */
    public function register(Request $request): JsonResponse
    {
        $user = new User((array)$request);
        $user->save();

        ImageManager::onStore($user,$request,'UserAvatar');
        $user->assignRole($request->input('roles')?:'client');
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['success' => true, 'data' => $user, 'access_token' => $token ]);
    }

    public function login(Request $request): JsonResponse
    {
        if (!Auth::attempt($request->only('tel1', 'password')))
        {
            Log::channel('auth-Login')->info("Login failed");
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::query()->where('tel1', $request['tel1'])->firstOrFail();
        if(!$user->hasActiveAcc()){
            return response()->json(['message' => 'Inactive account'], 401);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['success' => true, 'data' => $user, 'access_token' => $token ]);
    }

    //ToDo login with finger print
    public function loginFingerPrint(Request $request): JsonResponse
    {
        if (! Auth::attempt($request->only('tel', 'password')))
        {
            Log::channel('auth-LoginTel')->info("Login with tel failed");
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::query()->where('tel', $request['tel'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['success' => true, 'data' => UserResource::make($user), 'access_token' => $token ]);
    }

    // method for user logout and delete token
    public function logout(): JsonResponse
    {
        auth()->user()->tokens()->delete();
        return response()->json(['success' => true, 'user' => null]);
    }
}

