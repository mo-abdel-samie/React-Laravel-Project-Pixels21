<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use GeneralTrait;

    public function login(Request $request) {
        /**
         * Get a JWT via given credentials.
         *
         * @return \Illuminate\Http\JsonResponse
         */
        try {
            //Validation
            $rules = [
                'email' => 'required|exists:admins,email',
                'password' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }

            //Login
            $credentials = $request->only(['email', 'password']);
            //            $token = auth('admin-api')->attempt($credentials);
            $token = Auth::guard('admin-api')->attempt($credentials);
            if (!$token) {
                return $this->returnError('E001', 'Wrong Data');
            }
            //            $admin = Auth::guard('admin-api')->user();
            $admin = auth('admin-api')->user();
            $admin->api_token = $token;
            //Return token
            return $this->returnData('admin', $admin, 'returned token');
        } catch (\Exception $e) {
            return $this->returnError($e->getCode(), $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
//        auth()->logout();
//        return $this->returnSuccessMessage('Successfully logged out');
        $token = $request->header('auth_token');
        if ($token) {
            try {
                JWTAuth::setToken($token)->invalidate();
            } catch (TokenInvalidException $e) {
                return $this->returnError('', 'Invalid Token');
            }
            return $this->returnSuccessMessage('Logged out');
        } else {
            $this->returnError('', 'There is no token sent');
        }
    }
}
