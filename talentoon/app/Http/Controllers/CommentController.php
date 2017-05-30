<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommentService;
use \Response;
use JWTAuth;

class CommentController extends Controller
{
    //
    //
    /**
     * Send back all comments as JSON
     *
     * @return Response
     */
    public function index()
    {
        return Response::json(Comment::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $user= JWTAuth::parseToken()->toUser();

        $comment=new CommentService();
        $data=$comment->CreateComment($request,$user->id);

        return Response::json(array('message' => $data));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        //will be checked later
<<<<<<< HEAD
        dd('hiii simona');
=======

        // dd($request->all());

//        dd('simonaaaaaaaaaa');
        $user= JWTAuth::parseToken()->toUser();
>>>>>>> d21b4b3b00e091d1a9f9b5fcf274a4712edf073c
        $comment=new CommentService();
        $data=$comment->DeleteComment($request,$user->id);

        return Response::json(array('message' => $data));
    }
}
