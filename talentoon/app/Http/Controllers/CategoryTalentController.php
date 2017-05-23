<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryTalentService;

class CategoryTalentController extends Controller
{

    public function store(Request $request){

        $CTS_Obj=new CategoryTalentService();

        

        $response=$CTS_Obj->beTalent($request);
        return $response;
        // CategoryTalentService::betalent();
    }

    public function update(Request $request) {

        $CTS_Obj=new CategoryTalentService();

        $response=$CTS_Obj->mentorApprove($request);
        return $response;
    }
}
