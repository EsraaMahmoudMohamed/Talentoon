<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }

    public function posts()
    {
        $posts= Post::all();
        return view('admin.posts.index',['posts'=>$posts]);
    }
}
