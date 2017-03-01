<?php

namespace Autumn\JWTAuth\Http\Controllers;

use Validator;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use RainLab\User\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Routing\Controller as BaseController;

class AuthController extends BaseController
{
    protected $auth;

    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    public function authenticate(Request $request)
    {
        try {
            if (! $token = $this->auth->attempt($request->only('email', 'password'))) {
                return response()->json([
                    'error' => 'invalid_credentials',
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'could_not_create_token',
            ], $e->getStatusCode());
        }

        return response()->json(compact('token'));
    }

    public function register(Request $request)
    {
        $data = $request->all();

        if (! array_key_exists('password_confirmation', $request->all())) {
            $data['password_confirmation'] = $request->get('password');
        }

        $validator = $this->validator($data);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->getMessageBag(),
            ], 400);
        }

        $user = User::create($data);
        $token = $this->auth->attempt($request->only('email', 'password'));

        return response()->json(compact('user', 'token'));
    }

    public function user(Request $request)
    {
        $user = $request->user();

        return response()->json(compact('user'));
    }

    public function logout()
    {
        $this->auth->invalidate($this->auth->getToken());

        return response(null, 200);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|between:3,64|unique:users',
            'email' => 'required|between:3,64|email|unique:users',
            'password' => 'required|between:4,64|confirmed',
        ]);
    }
}
