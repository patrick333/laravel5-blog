<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Message;
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
        $num_per_page = env('num_per_page_admin');
        $messages = Message::latest()->paginate($num_per_page);

        return view('admin.messages.index', compact('messages'));
    }



}