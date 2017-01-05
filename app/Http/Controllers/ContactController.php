<?php

namespace csi\Http\Controllers;

use csi\Message;
use Illuminate\Http\Request;

use csi\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ContactController extends Controller
{
	protected $messages;

	public function __construct(Message $message)
	{
		$this->messages = $message;
	}

    public function index(){
    	$messages = $this->messages->paginate(10);

        return view('backend.messages.index', compact('messages'));
    }

    public function create(Requests\StoreMessageRequest $request){
    	$attr = [
    		'name' => $request->input('name'),
    		'email' => $request->input('email'),
    		'message' => $request->input('message')
    	];

    	if($this->messages->create($attr)){
    		return Response::json(array(
    			'code' => 200,
    			'message' => 'Save Message Successfull'
    			), 200);
    	}
    }
}
