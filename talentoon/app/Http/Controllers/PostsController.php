<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostsController extends Controller
{
        public function index() {
                $posts= Post::all();
                return view('posts.index',['posts'=>$posts]);
            }
        public function create(){
            return view('posts.create');
        }
        public function store(Request $request){
        //    Mail::to('mina.zakaria.zakher@gmail.com')->send(new WelcomeMina());
        Post::create($request->all());
        return redirect('/post');
       }
}
