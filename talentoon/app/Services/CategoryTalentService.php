<?php

namespace App\Services;

use App\Models\CategoryTalent;
use App\Http\Requests;

class CategoryTalentService
{

    public function beTalent($request){

        //dd($request->all());
        CategoryTalent::create($request->all());

        $media_type='image';
        
    }


}
