<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserProfile extends Controller
{
    //
  public function index(Request $request){

$user= JWTAuth::parseToken()->toUser();
return response()->json(['status' => 1,
                    'message' => 'user data send successfully',
                  'user_id'=>$user->id,
                'first_name'=>$user->first_name,
                'last_name'=>$user->last_name,
                'image'=>$user->image,
              ]);


  }



}
