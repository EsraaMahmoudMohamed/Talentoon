<?php

namespace App\Services;

use App\Models\CategoryMentor;
//use Illuminate\Http\Request;
use Validator;
use DB;
use Carbon\Carbon ;

class CategoryMentorService
{

    public function beMentor($mentor_data){
//        dd($mentor_data['id']);
    $rules = [
//        $mentor_data['id'] => 'required|unique:category_mentors',
//        $mentor_data['mentor_id'] =>'required|numeric',
//        $mentor_data['category_id'] =>'required|numeric',
//        $mentor_data['experience'] =>'required',
        $mentor_data['years_of_experience'] =>'numeric'

    ];
    $messages=[
        $mentor_data['mentor_id'].'required' => 'you didn\'t choose a mentor',
        $mentor_data['mentor_id'].'numeric' => 'mentor id is numeric',
        $mentor_data['category_id'].'required' => 'you didn\'t choose a category',
        $mentor_data['category_id'].'numeric' => 'category id is numeric',
        $mentor_data['experience'].'required' => 'experience is required',
        $mentor_data['years_of_experience'].'numeric' => 'years of experience is required'

        ];


    $validator = Validator::make($mentor_data,$rules,$messages);

    if ($validator->passes())
    {


        CategoryMentor::create($mentor_data);
        return response()->json(['mesg'=>'zai al follll']);


    }else{
        //al validation sa7 bass na2s an ab3t al message al json de ll client
;
        return response()->json(['errors'=>$validator->messages()]);
//


    }

    }

    public function UnMentor($update_data){

        $category=$update_data['category_id'];
        $mentor=$update_data['mentor_id'];



        DB::table('category_mentors')->where('category_id', $category)
            ->where('mentor_id', $mentor)
            ->update(['deleted_at' => Carbon::now()]);

        return response()->json(["msg" => "done"]);

    }
    public function ApproveMentor($update_data){

        $category=$update_data['category_id'];
        $mentor=$update_data['mentor_id'];

        DB::table('category_mentors')->where('category_id', $category)
            ->where('mentor_id', $mentor)
            ->update(['status' => 1]);

        return response()->json(["msg" => "done"]);

    }



}

