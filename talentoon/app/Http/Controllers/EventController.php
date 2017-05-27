<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EventService;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use DB;
class EventController extends Controller
{
    public function index(){

            $data = DB::table('events')
                ->join('users', 'users.id', '=', 'events.mentor_id')
                ->select('events.*','users.first_name as first_name', 'users.last_name as last_name', 'users.image as user_image')
                ->get();

        return response()->json(['data'=>$data]);
    }
    //store the created events
    public function store(Request $request)
    {
        $new_event= new EventService();
        $event=$request->all();
        $data = $new_event->add_event($event);
//        return response()->json(['data' => $data,'status' => '1','message' => 'data sent successfully']);
        return $data;
    }
    //to give the creator the avaliblity to update in event's data
    //it is'nt found in back log
    public function edit(Request $request){

    }
    //by clicking on the event a page is opened to see it's contents
    public function show(Request $request){

        $new_event= new EventService();
        $event=$request->all();
        $data = $new_event->show_event($event);
        return $data;

    }

}