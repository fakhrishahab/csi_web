<?php

namespace csi\Http\Controllers;

use csi\Subscribe;
use Illuminate\Http\Request;

use csi\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class SubscribeController extends Controller
{
	protected $subscribes;

	public function __construct(Subscribe $subscribe){
		$this->subscribes = $subscribe;
	}

    public function index(){
    	$subscribes = $this->subscribes->paginate(10);

        return view('backend.subscribe.index', compact('subscribes'));
    }

    public function create(Requests\StoreSubscribeRequest $request){
    	$attr = [
    		'email' => $request->input('email')
    	];

    	if($this->subscribes->create($attr)){
    		return Response::json(array(
    			'code' => 200,
    			'message' => 'Save Subscribe Successfull'
    			), 200);
    	}

    	// $subscribes = new Subscribe;

    	// $subscribes->email = $request->input('email');

    	// $subscribes->save();
    }
}
