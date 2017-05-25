<?php

namespace App\Services;

use App\Models\CategoryTalent;
use App\Http\Requests;
use DB;

class CategoryTalentService
{

    public function beTalent($request){

        //dd($request->all());
        $id = CategoryTalent::create($request->all())->id;
        return response()->json(['category_talent_id' => $id,'message' => 'data saved successfully']);
//        $media_type='image';
        
    }

    public function mentorApprove($request){

        $category=$request['category_id'];
        $mentor=$request['talent_id'];

        DB::table('category_talents')->where('category_id', $category)
            ->where('talent_id', $mentor)
            ->update(['status' => 1]);

        return response()->json(["msg" => "done"]);

    }

}
