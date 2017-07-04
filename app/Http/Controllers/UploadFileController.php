<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Redirect;
use Session;
use Response;


class UploadFileController extends Controller
{
    public function index(){
        return view('upload.index');
    }

    public function image(Request $request) {

        $data = array('image' => $request->file('files'));
        $rules = array(
            'image' => 'required|max:5048',
            );

        $validator = Validator::make($data,$rules);

        if($validator->fails()) {
            return Response::json($validator->errors()->first('image'), 400);
        }

        $file = $request->file('files');
        $destinationPath = 'assets/uploads'; // upload path
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $fileName = sha1(time().time()).".{$extension}";
        $file->move($destinationPath, $fileName); // uploading file to given path

        return Response::json(array('success' => 200,
            'filename' => $fileName
        ));

    }



    public function imagess(Request $request) {

        $data = array('image' => $request->file('files'));
        $rules = array(
            'image' => 'required|max:5048',
            );

        $validator = Validator::make($data,$rules);

        if($validator->fails()) {
            return Response::json($validator->errors()->first('image'), 400);
        }

        $file = $request->file('files');
        $destinationPath = 'assets/blog'; // upload path
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $fileName = sha1(time().time()).".{$extension}";
        $file->move($destinationPath, $fileName); // uploading file to given path

        return $fileName;

    }


    public function file_upload(Request $request) {

        $data = array('image' => $request->file('files'));
        $rules = array(
            'image' => 'required|max:'.MAX_FILE_SIZE,
            );

        $validator = Validator::make($data,$rules);

        if($validator->fails()) {
            return Response::json($validator->errors()->first('image'), 400);
        }

        $file = $request->file('files');
        $destinationPath = 'file_upload'; // upload path
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $fileName = sha1(time().time()).".{$extension}";
        $file->move($destinationPath, $fileName); // uploading file to given path

        return $fileName;

    }
}
