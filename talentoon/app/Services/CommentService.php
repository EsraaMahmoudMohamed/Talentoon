<?php

namespace App\Services;

use App\Models\Comment;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use \Response;
use Carbon\Carbon ;
use DB;

class CommentService
{

    public function CreateComment($request){



        Comment::create(array(
            'text' => $request['text'],
            'user_id' => $request['user_id'],
            'commentable_id' => $request['commentable_id'],
            'commentable_type' => $request['commentable_type']
        ));

        return Response::json(array('success' => true));
    }
    public function DeleteComment($id){
        $user = Comment::find($id);

        $user->delete();
        dd($user);
        Comment::where('id', '=', $id)->delete();

        return Response::json(array('success' => true));
    }



}