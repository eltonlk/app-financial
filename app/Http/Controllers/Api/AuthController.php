<?php

namespace AppFinancial\Http\Controllers\Api;

use AppFinancial\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lang;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function login (Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->credentials($request);

        if ($token = Auth::guard('api')->attempt($credentials)) {
            return $this->sendLoginResponse($request, $token);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function logout ()
    {
        Auth::guard('api')->logout();

        return response()->json([], 204);
    }

    public function refreshToken (Request $request)
    {
        $token = Auth::guard('api')->refresh();

        return $this->sendLoginResponse($request, $token);
    }

    protected function sendLoginResponse (Request $request, $token)
    {
        $this->clearLoginAttempts($request);

        return response()->json([
            'token' => $token,
        ]);
    }

    protected function sendLockoutResponse (Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        $message = Lang::get('auth.throttle', [
            'seconds' => $seconds,
        ]);

        return response()->json([
            'message' => $message,
        ], 403);
    }

    protected function sendFailedLoginResponse (Request $request)
    {
        $message = Lang::get('auth.failed');

        return response()->json([
            'message' => $message,
        ], 401);
    }
}
