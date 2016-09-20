<?php

namespace csi\Http\Controllers\Backend;

use csi\ContentHome;
use Illuminate\Http\Request;

use csi\Http\Requests;

class ContentHomeController extends Controller
{
    protected $content;

    public function __construct(ContentHome $content)
    {
    	$this->content = $content;
    }

    public function show($id)
    {
    	$content = $this->content->all();

    	return view('backend.content_home.index', compact('content'));
    }
}
