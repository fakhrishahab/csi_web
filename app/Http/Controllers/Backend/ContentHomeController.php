<?php

namespace csi\Http\Controllers\Backend;

use csi\ContentHome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use csi\Http\Requests;

class ContentHomeController extends Controller
{
    protected $content, $id;

    public function __construct(ContentHome $content)
    {
    	$this->content = $content;
        $this->path = 'public/images/featured/';
    }

    public function show($id, ContentHome $content, Request $request)
    {
        
        $this->id = $content->getId($request->url());
        // echo $this->id;
    	$content = $this->content->all();

    	return view('backend.content_home.index', compact('content'));
    }

    public function create(ContentHome $content)
    {
        return view('backend.content_home.form', compact('content'));
    }

    public function store(Requests\StoreContentHomeRequest $requests)
    {
        echo $this->id;
        // $attr = [
        //     'page_id' => $this->id,
        //     'headline' => $request->only('headline')['headline'],
        //     'description' => $request->only('description')['description']
        // ];

        // if($request->hasFile('image')){
        //     $filename = $request->file('image')->getClientOriginalName();
        //     $file = $request->file('image')->getClientOriginalExtension();
        //     $path = 'public/images/featured/';
        //     $request->file('image')->move($path, $filename);

        //     $attr['image'] = $this->path.''.$filename;
        // }

        // $this->content->create($attr);

        // return redirect(route('backend.pages.index'))->with('status', 'Content Home has been created');
    }

    public function edit($id)
    {
        $content = $this->content->findOrFail($id);

        return view('backend.content_home.form', compact('content'));
    }

    public function update(Requests\UpdateContentHomeRequest $request, $id)
    {
        $content = $this->content->findOrFail($id);

        $attr = [
            'headline' => $request->only('headline')['headline'],
            'description' => $request->only('description')['description']
        ];

        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalName();
            $file = $request->file('image')->getClientOriginalExtension();
            $path = 'public/images/featured/';
            $request->file('image')->move($path, $filename);

            $attr['image'] = $this->path.''.$filename;
        }
        // print_r($attr);
        $content->fill($attr)->save();

        return redirect(route('backend.pages.index'))->with('status', 'Content has been updated');
    }

    public function confirm($id)
    {
        $content = $this->content->findOrFail($id);

        return view('backend.content_home.confirm', compact('content'));
    }

    public function destroy($id)
    {
        $content = $this->content->findOrFail($id);

        $content->delete();

        return redirect(route('backend.pages.index'))->with('status', 'Content has been deleted');
    }
}
