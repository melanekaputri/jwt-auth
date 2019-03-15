<?php

namespace App\Http\Controllers\api\Auth;

use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';

    protected $auth;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;

    }

    public function login(Request $request)
    {
       
        if ($this->hasTooManyLoginAttempts($request)){
            $this->fireLockoutEvent($request);

            return response()->json([
                'success' => false,
                'errors' => [
                    "You've been lock out"
                ]
            ]);
        }

        $this->incrementLoginAttempts($request);

       try{
           if(!$token = $this->auth->attempt($request->only('email','password'))){
               return response()->json([
                   'success' => false,
                   'errors' => [
                       'email' => [
                           "Invalid email address and password"
                       ]
                   ]
                       ],422);
           }

       }catch(JWTException $e){
            return response()->json([
                'success' => false,
                'errors' => [
                    'email' => [
                        "Invalid email address and password"
                    ]
                ]
                    ],422);
       }

       return response()->json([
            'success' => true,
            'data' => $request->user(),
            'token' => $token
       ],200);
    }
}
