<?php

namespace App\Services;

use App\Models\CategoryTalent;
use App\Http\Requests;

class CategoryTalentService {

    public function beTalent($request) {

        $CT_Obj = CategoryTalent::create($request->all());

        if ($CT_Obj->getAttributes()) {

            return response()->json([
                        'status' => 200,
                        'message' => 'Talent inserted and is pending initial review',
                        'data' => $CT_Obj->getAttributes()
            ]);
        } else {
            return response()->json([
                        'status' => 500,
                        'message' => 'Talent Couldnot be inserted',
                        'data' => NULL
            ]);
        }
    }

    public function updateTalent($request, $talent_id) {

        $CT_Obj = CategoryTalent::find($talent_id);

        if ($CT_Obj->getAttributes()) {

            //Returns True or False
            if ($CT_Obj->update(['status' => 1])) {

                return response()->json([
                            'status' => 200,
                            'message' => 'Talent status updated successfully',
                            'data' => $CT_Obj->getAttributes()
                ]);
            } else {
                return response()->json([
                            'status' => 500,
                            'message' => 'Talent status Couldnot be Updated',
                            'data' => NULL
                ]);
            }
        }
    }

}
