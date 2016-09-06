<?php

namespace csi\Http\Controllers\Backend;

use csi\Page;
use Illuminate\Http\Request;

use csi\Http\Requests;

class PagesController extends Controller
{
    protected $pages;

    public function __construct(Page $pages)
    {
    	$this->pages = $pages;

    	parent::__construct();
    }

    public function index()
    {
    	$pages = $this->pages->all();

    	return view('backend.pages.index', compact('pages'));
    }

    public function confirm($id)
    {

    }

    public function destroy($id){
    	
    }

    public function edit($id)
    {

    }
}
