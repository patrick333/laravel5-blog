<?php

namespace App\Http\Controllers;
use Input;
use Validator;
use Redirect;
use Request;
use Session;
class ApplyController extends Controller {
    public function upload() {
        // getting all of the post data
        $file = array('image' => Input::file('image'));
        // setting up rules
        $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('upload')->withInput()->withErrors($validator);
            //withInput(): keep the filled-in data.
            //withErrors(): Add validation errors to the view.
        }
        else {
            // checking file is valid.
            if (Input::file('image')->isValid()) {
                $destinationPath = 'uploads'; // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                $moveResult=Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
//                if(is_a($moveResult,'FileException')){
//                    Session::flash('error', 'the file cannot be saved');
//                    return Redirect::to('upload');
//                }
                Session::flash('success', 'Upload successfully');
                return Redirect::to('upload');
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('upload');
            }
        }
    }
}