<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkShop;
use DB;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class WorkShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $id=WorkShop::create($request->all())->id;

        return response()->json(['workshop_id'=>$id,'message' => 'data saved successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $workshop = DB::table('workshops')
            ->join('categories', 'workshops.category_id', '=', 'categories.id')
            ->join('users', 'workshops.mentor_id', '=', 'users.id')
            ->select('workshops.*', 'categories.title as category_title', 'users.first_name', 'users.last_name')
            ->where("workshops.id",$id)
            ->get();

        return response()->json(['post' => $workshop,'status' => '1','message' => 'data sent successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function showSingleWorkshop($workshop_id){
        try {
            //dd($request->all());
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());
        }


      $workshop = DB::table('workshops')
          ->join('categories', 'workshops.category_id', '=', 'categories.id')
          // ->join('users', 'posts.user_id', '=', 'users.id')
          ->select('workshops.*', 'categories.title as category_title')

          // ->select('posts.*', 'categories.title as category_title', 'users.first_name', 'users.last_name', 'users.image')

              ->where("workshops.id",$workshop_id)
          ->get()->first();

      return response()->json(['user'=>$user,'workshop' => $workshop,'status' => '1','message' => 'workshop sent successfully']);



    }
}
