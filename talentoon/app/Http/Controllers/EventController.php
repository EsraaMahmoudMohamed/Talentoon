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
        $events= Event::all();
        $events_creator=array();
        foreach ($events as &$event){
//            dd($event->mentor_id);
            $data = DB::table('events')
                ->join('users', 'users.id', '=', 'events.mentor_id')
                ->select('users.first_name as first_name', 'users.last_name as last_name', 'users.image as user_image')
                ->where("users.id",$event->mentor_id)
                ->get();
            array_push($events_creator,$data);
//            dd(json_encode($data));
        }
//        foreach ($events as &$event){
//            foreach (){
//
//            }
//            $event->first_name=$data['first_name'];
//            $event->last_name=$data->['last_name'];
//            $event->user_image=$data->['user_image'];
//        }

        return response()->json(['event' => $events,'data'=>$events_creator]);
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