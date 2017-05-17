<?php

namespace App\Http\Controllers;

use App\Models\Category;
// use App\Mail\WelcomeToTalentoonCommunity;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Mail;
class CategoriesController extends Controller
{
        public function index() {
                $categories= Category::all();
                return view('categories.index',['categories'=>$categories]);
            }
        public function create(){
            return view('categories.create');
        }
        public function store(Request $request){
        //    Mail::to('mina.zakaria.zakher@gmail.com')->send(new WelcomeToTalentoonCommunity());

    //     $emailData = array(
    //        'to'        => 'mina.zakaria.zakher@gmail.com',
    //        'from'      => 'talentoon88@gmail.com',
    //        'subject'   => 'Laravel Mail Test',
    //        'body'      => 'This is the body',
    //        'view'      => 'emails.welcome'
    //    );
       //
    //    Mail::send($emailData['view'], $emailData, function ($message) use ($emailData) {
    //        $message
    //            ->to($emailData['to'])
    //            ->from($emailData['from'])
    //            ->subject($emailData['subject']);
    //    });


        Category::create($request->all());
        return redirect('/category');
       }
}
