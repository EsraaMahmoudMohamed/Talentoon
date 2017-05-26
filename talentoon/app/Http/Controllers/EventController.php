<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EventService;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
class EventController extends Controller
{
    public function index(){
        $events= Event::all();
        return response()->json(['event' => $events]);
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