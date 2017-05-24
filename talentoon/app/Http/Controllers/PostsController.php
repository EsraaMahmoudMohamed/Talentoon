<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DB;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts= Post::all();
        // return view('posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Mail::to('mina.zakaria.zakher@gmail.com')->send(new WelcomeMina());
        // dd($request->all());

        // return response()->json(['cat_id'=>$cat_id,'status' => $request->all(),'message' => 'data saved successfully']);

        //Post::create($request->all());

        $id = Post::create($request->all())->id;

        return response()->json(['post_id' => $id,'message' => 'data saved successfully']);
        // return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'categories.title as category_title', 'users.first_name', 'users.last_name', 'users.image')
            ->where("posts.id",$id)
            ->get();
        return response()->json(['post' => $post,'status' => '1','message' => 'data sent successfully']);

        // return view('posts.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'categories.title as category_title', 'users.first_name', 'users.last_name', 'users.image')
            ->where("posts.id",$id)
            ->get();
        return response()->json(['post' => $post,'status' => '1','message' => 'data sent successfully']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        post::find($id)->update($request->all());
        return response()->json(['status' => '1','message' => 'data sent successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post=Post::findOrFail($id);
        $post->delete();
        return response()->json(['status' => '1','message' => 'post deleted successfully']);
    }
}
