<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommentService;
use \Response;

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


        $comment=new CommentService();
        $data=$comment->CreateComment($request);

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
        dd('hiii simona');
        $comment=new CommentService();
        $data=$comment->DeleteComment($request);

        return Response::json(array('message' => $data));
    }
}
