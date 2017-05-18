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
            $destinationPath = 'upload';// upload folder in public directory
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
                }
        }
        if ($uploadcount == $file_count) {
            Session::flash('success', 'Upload successfully');
            return Redirect::to('upload');
        } else {
            return Redirect::to('upload')->withInput()->withErrors($validator);
        }


    }
}
