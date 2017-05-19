<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Response;
use Session;
use App\Models\Upload;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadController extends Controller
{
    //
    public function uploded()
    {
        return view('/uploads/multiple');
    }

    public function store(Request $request)
    {


        $name = $request->input('image');
        return $name;

        //
    }

    public function multiple_upload(Request $request)
    {



        //getting all of the post data
        //            $files = $request->file('images');
        $files = Input::file('images');
//            dd($files);
        //Making counting of uploaded images
        $file_count = count($files);

        //start count how many uploaded
        $uploadcount = 0;

        foreach ($files as $file) {
            $rules = array('file' => 'required');//required|mimes:png,gif,jpeg,txt,pdf
            $validator = Validator::make(array('file' => $file), $rules);
            if ($validator->passes()) {
            $destinationPath = 'uploads';// uploads folder in public directory
            $filename = $file->getClientOriginalName();
            $upload_success = $file->move($destinationPath, $filename);
            $uploadcount++;

            //save into database
            $extension = $file->getClientOriginalExtension();
            $entry = new Upload();
            $entry->mime = $file->getClientMimeType();
            $entry->original_filename = $filename;
            $entry->filename = $file->getFilename() . '.' . $extension;
            $entry->save();
            dd('saved');
                }
        }

//        if ($uploadcount == $file_count) {
//            Session::flash('success', 'Upload successfully');
//            return Redirect::to('upload');
//        } else {
//            return Redirect::to('upload')->withInput()->withErrors($validator);
//        }

    }

    public function single_upload(Request $request)
    {
        dd($request);
        //getting the post data
            // $files = Input::file('images');


        //Making counting of uploaded images
        // $file_count = count($files);

        //start count how many uploaded
        // $uploadcount = 0;

        // foreach ($files as $file) {
            $rules = array('file' => 'required|mimes:png,gif,jpeg,jpg,txt,pdf');//required|mimes:png,gif,jpeg,txt,pdf
            $validator = Validator::make(array('file' => $file), $rules);
            if ($validator->passes()) {
            $destinationPath = 'uploads';// uploads folder in public directory
            $filename = $file->getClientOriginalName();
            $upload_success = $file->move($destinationPath, $filename);
            $uploadcount++;

            //save into database
            $extension = $file->getClientOriginalExtension();
            $entry = new Upload();
            // $entry->mime = $file->getClientMimeType();
            // $entry->original_filename = $filename;
            $entry->filename = $file->getFilename() . '.' . $extension;
            $images_ext = array('png','jpeg','jpg','gif');
            $videos_ext = array('mp4','flv');
            $files_ext  = array('txt','pdf');
            $voice_ext  = array('mp3','aac');
            if(in_array($extension,$image_ext)){
                $entry->media_type='image';
            }elseif (in_array($extension,$files_ext)) {
                $entry->media_type='file';
            }elseif (in_array($extension,$videos_ext)) {
                $entry->media_type='vedio';
            }elseif (in_array($extension,$voice_ext)){
                $entry->media_type='audio';
            }
            $entry->media_source=$ally_htb3ato_nada;
            $entry->source_id=$ally_htb3ato_nada;
            $entry->save();
            Session::flash('success', 'Upload successfully');
            return Redirect::to('upload');
                }
        // }
        // if ($uploadcount == $file_count) {
        //
        // } else {
        //     return Redirect::to('upload')->withInput()->withErrors($validator);
        // }
    }
}
