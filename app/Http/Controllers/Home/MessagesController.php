<?php namespace App\Http\Controllers\Home;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Message;
use Input;
use Redirect;

use App\Http\Requests\MessageRequest;
use Illuminate\Http\Request;

class MessagesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
    }


    public function contactMe(MessageRequest $request)
    {
        $request->input('title');

        $result=\Mail::raw(Input::get('message'), function($message)
        {
            $message->to('shaopeihui1@gmail.com', 'Peihui Shao')
                ->subject('Message from '.Input::get('email').', '.Input::get('user'));
        });

        Message::create($request->all());

//        flash()->info(        var_dump($result)); //not working

        flash()->success('Your message has been delivered and saved!');
        return Redirect::back();
    }



}