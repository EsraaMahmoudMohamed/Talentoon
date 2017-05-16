<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoriesController extends Controller
{
        public function index() {
                $categories= Category::all();
                return view('categories.index',['categories'=>$categories]);
            }
        public function create(){
            return view('categories.create');
        }
        public function store(Request $request){
        //    Mail::to('mina.zakaria.zakher@gmail.com')->send(new WelcomeMina());
        Category::create($request->all());
        return redirect('/category');
       }
}
