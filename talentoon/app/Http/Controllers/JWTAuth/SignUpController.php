<?php

namespace App\Http\Controllers\JWTAuth;

use App\Models\User;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function signup(Request $request, JWTAuth $JWTAuth)
    {
        //$user = new User($request->all());
        $password= Hash::make($request['password']);
        $credentials = [
           'email' =>$request['email'],
            'password'=>$password
        ];
        //dd($credentials);
        $user = User::create($credentials);
        
        //$input['password'] = Hash::make($input['password']);
        $RegisteredUser = User::where('email', $request['email'])->first();
        //dd($RegisteredUser);
        $var=$RegisteredUser->update([
           'first_name'=>$request['first_name'],
            'last_name'=>$request['last_name'],
            'phone'=>$request['phone'],
            'country_id'=>$request['country_id'],
            'gender'=>$request['gender'],
            'date_of_birth'=>$request['date_of_birth'],
            'image'=>$request['image']
        ]);
        //dd($var);
//        if(!$user->save()) {
//            throw new HttpException(500);
//        }
        //dd($credentials);
        $token = $JWTAuth->fromUser($user);
        return response()->json([
            'status' => 'ok',
            'token' => $token
        ], 201);
    }
}