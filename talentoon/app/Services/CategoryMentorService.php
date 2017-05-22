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
        $mentor_data['mentor_id'] =>'required|numeric',
        $mentor_data['category_id'] =>'required|numeric',
        $mentor_data['experience'] =>'required|alpha_num',
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
//        $this->validate(
//        $dataarray = json_encode($mentor_data,true);
//        dd(gettype($mentor_data));

    $validator = Validator::make($mentor_data,$rules,$messages);
//    dd($messages,$validator);
    if ($validator->passes())
    {

//        return 'hello';
        CategoryMentor::create($mentor_data);
        return $this->respondCreated('Lesson created successfully');


    }else{
        //al validation sa7 bass na2s an ab3t al message al json de ll client
//        return '{\'name\':\'error\'}';
        return response()->json(['errors'=>$validator->messages()]);
//        return $validator->messages()->toJson();
//        return response()->json(['status' => 0, 'message' => $messages]);
    }

    }

    public function UnMentor($update_data){

        $category=$update_data['category_id'];
        $mentor=$update_data['mentor_id'];


//        $category_mentor = CategoryMentor::where('category_id', $category)
//            ->where('mentor_id', $mentor)
//            ->get();

        DB::table('category_mentors')->where('category_id', $category)
            ->where('mentor_id', $mentor)
            ->update(['deleted_at' => Carbon::now()]);
//        dd($category_mentor[0]);

//        if( $category_mentor[0]->deleted_at == null )
//        {
//            $category_mentor->softDeletes();
//            $category_mentor->save();
//        }

        return response()->json(["msg" => "done"]);

    }
    public function ApproveMentor($update_data){

        $category=$update_data['category_id'];
        $mentor=$update_data['mentor_id'];
//        $category_mentor = CategoryMentor::where('category_id', '=', $category)
//            ->where('mentor_id', '=', $mentor);
//        $category_mentor = DB::table('category_mentors')
//            ->where('category_id', $category)
//            ->where('mentor_id', $mentor)
//            ->get();
        DB::table('category_mentors')->where('category_id', $category)
            ->where('mentor_id', $mentor)
            ->update(['status' => 1]);
//            ->toArray();
//        dd($category_mentor);


//        if($category_mentor[0]->status == 0)
//        {
////            dd($category_mentor);
//            $category_mentor[0]->status = 1;
//            $category_mentor->save();
//            return response()->json(["msg" => "done"]);
//        }else{
////            dd($category_mentor);
//            $category_mentor[0]->status = 0;
//            $category_mentor->save();
//            return response()->json(["msg" => "error"]);
//        }

//        $page = Page::find($mentor_id);
//
//        // Make sure you've got the Page model
//        if($page) {
//            $page->image = 'imagepath';
//            $page->save();
//        }
        return response()->json(["msg" => "done"]);

    }



}

