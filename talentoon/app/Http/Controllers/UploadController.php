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

    public function test (Request $request){
        return response()->json(['yes'=>'yes','request'=>$_FILES]);
        if(!empty($_FILES['file_one'])){

        // $ext = $f->getClientOriginalExtension();

		// $ext = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
                // $image = time().'.'.$ext;
            $x= move_uploaded_file($_FILES["file_one"]['tmp_name'], 'uploads/'.$_FILES["file_one"]["name"]);
		echo "Image uploaded successfully as ".$_FILES['file_one']['name'];
        return response()->json(['request'=> $x,'message' => 'data sent successfully']);

	}else{
		echo "Image Is Empty";
	}

    }

    public function test2(Request $request){

        return response()->json(['request'=>$request,'message' => 'data sent successfully before']);

        if(!empty($_FILES['file_one'])) {
            return response()->json(['request'=>$_FILES,'message' => 'data sent successfully']);
        }else{
            return response()->json(['request'=>$_FILES,'message' => 'no data successfully']);
        }
        // Category::create($request->all());
        // return redirect()->route('category.index');
//        return response()->json(["request isss" => $request->all()]);
        $data=$request->all();
        $fileName = 'null';


        return response()->json(['request'=>$request->all(),'message' => 'data sent successfully']);
//        return $request->all();


        if ($request->hasFile('file_one')) {
            if($request->file('file_one')->isValid()) {
                $destinationPath = public_path('uploads/files');
                $extension =$request->file('file_one')->getClientOriginalExtension();
                $fileName = uniqid().'.'.$extension;
                $request->file('file_one')->move($destinationPath, $fileName);
            }
        }
//        Category::create([
//            'title' => $data['title'],
//            'image' => $fileName,
//        ]);
        return response()->json(['request'=>'done','message' => 'data sent successfully']);
//        return redirect()->route('category.index');







////        return response()->json(['request'=>'hh','message' => 'data sent successfully']);
//        if ( !empty( $_FILES ) ) {
//
////            $tempPath = $_FILES[ 'file' ][ 'tmp_name' ];
//            return response()->json(['request'=>$_FILES,'message' => 'data sent successfully']);
//
//            $x= move_uploaded_file($_FILES["image"]['tmp_name'], 'uploads/'.$_FILES["image"]["name"]);
//            return response()->json(['request'=>$x,'message' => 'data sent successfully']);
//
//            $uploadPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $_FILES[ 'file' ][ 'name' ];
//            move_uploaded_file( $tempPath, $uploadPath );
//            $answer = array( 'answer' => 'File transfer completed' );
//            $json = json_encode( $answer );
//            echo $json;
//        } else {
//            return response()->json(['request'=>$request,'message' => 'no files']);
////            echo 'No files';
//        }


    }

    public function single_upload(Request $request)
    {
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
