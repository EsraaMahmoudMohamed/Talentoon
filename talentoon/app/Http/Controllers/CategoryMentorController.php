<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryMentorService;
use Illuminate\Support\Facades\Auth;
class CategoryMentorController extends Controller
{
    //
    public function store(Request $request)
    {
        $category_mentor= new CategoryMentorService();
        $mentor_data=$request->all();
        $data = $category_mentor->beMentor($mentor_data);
        return $data;
    }
    public function update(Request $request){
        //Sentry::getUser()->id;
        if($request->all()['action']=="unmentor"){
            $category_mentor= new CategoryMentorService();
            $data = $category_mentor->UnMentor($request);
            return $data;
        }elseif ($request->all()['action']=="approve"){
            $category_mentor= new CategoryMentorService();
            $data =$category_mentor->ApproveMentor($request);
            return $data;
        }else{
            return response()->json(['status' => 0, 'message' => 'unkown action']);
        }
    }
}