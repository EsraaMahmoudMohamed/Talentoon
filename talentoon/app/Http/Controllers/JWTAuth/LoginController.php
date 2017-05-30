<?php

namespace App\Http\Controllers\JWTAuth;

use App\Models\User;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class LoginController extends Controller {

    public function login(Request $request, JWTAuth $JWTAuth) {
        $credentials = $request->only(['email', 'password']);
        //dd($credentials);
        try {
            $token = $JWTAuth->attempt($credentials);
            //dd($token);
            if (!$token) {
                throw new AccessDeniedHttpException();
            }
        } catch (JWTException $e) {
            throw new HttpException(500);
        }

        return response()
                        ->json([
                            'status' => 'ok',
                            'token' => $token
        ]);
    }

    // somewhere in your controller
    public function getAuthenticatedUser(Request $request,JWTAuth $JWTAuth) {
        try {
            //dd($request->all());
            if (!$user = $JWTAuth->parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());
        }

        // the token is valid and we have found the user via the sub claim
        return response()->json(['user'=>$user]);
    }

}
