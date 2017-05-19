<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryTalentService;

class CategoryTalentController extends Controller
{
    public function store(Request $request){
        
        $CategoryTalentServiceObj=new CategoryTalentService();
        $CategoryTalentServiceObj->beTalent($request);
    } 
}
