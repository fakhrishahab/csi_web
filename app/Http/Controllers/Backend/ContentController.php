<?php

namespace csi\Http\Controllers\Backend;

use csi\Content;
use csi\Page;
use csi\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use csi\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ContentController extends Controller
{
    protected $content, $pages;

    public function __construct(Content $content, Page $pages, Gallery $gallery)
    {
    	$this->content = $content;
    	$this->pages = $pages;
        $this->gallery = $gallery;
        $this->path = 'public/images/featured/';
    }

    public function index()
    {	
        $content = $this->content->with('page')->paginate(10);

    	return view('backend.content.index', compact('content'));
    }

    public function create(Content $content)
    {
    	$pages = $this->pages->orderBy('id')->pluck('title', 'id');
        return view('backend.content.form', compact('content', 'pages'));
    }

    public function store(Requests\StoreContentRequest $request)
    {
        // echo $this->id;
        $attr = [
            'page_id' => $request->only('page_id')['page_id'],
            'title' => $request->only('title')['title'],
            'headline' => $request->only('headline')['headline'],
            'description' => $request->only('description')['description']
        ];

        if($request->hasFile('image')){
            $filename = preg_replace('/\s+/', '', $request->file('image')->getClientOriginalName());
            $file = $request->file('image')->getClientOriginalExtension();
            $path = 'public/images/featured/';
            $request->file('image')->move($path, $filename);
            $attr['image'] = $path.''.$filename;
        }

        if($request->hasFile('background')){
            $filename = preg_replace('/\s+/', '', $request->file('background')->getClientOriginalName());
            $file = $request->file('background')->getClientOriginalExtension();
            $path = 'public/images/background/';
            $request->file('background')->move($path, $filename);

            $attr['background'] = $path.''.$filename;
        }

        $this->content->create($attr);

        return redirect(route('backend.content.index'))->with('status', 'Content Home has been created');
    }

    public function edit($id)
    {
        $content = $this->content->findOrFail($id);
    	$pages = $this->pages->orderBy('id')->pluck('title', 'id');

        return view('backend.content.form', compact('content', 'pages'));
    }

    public function update(Requests\UpdateContentRequest $request, $id)
    {
        $content = $this->content->findOrFail($id);
        
        $attr = [
            'page_id' => $request->only('page_id')['page_id'],
            'title' => $request->only('title')['title'],
            'headline' => $request->only('headline')['headline'],
            'description' => $request->only('description')['description']
        ];

        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalName();
            $file = $request->file('image')->getClientOriginalExtension();
            $path = 'public/images/featured/';
            $request->file('image')->move($path, $filename);
            $attr['image'] = $path.''.$filename;
        }

        if($request->hasFile('background')){
            $filename = $request->file('background')->getClientOriginalName();
            $file = $request->file('background')->getClientOriginalExtension();
            $path = 'public/images/background/';
            $request->file('background')->move($path, $filename);
            $attr['background'] = $path.''.$filename;
        }
        // print_r($attr);
        $content->fill($attr)->save();

        return redirect(route('backend.content.index'))->with('status', 'Content has been updated');
    }

    public function confirm($id)
    {
        $content = $this->content->findOrFail($id);

        return view('backend.content.confirm', compact('content'));
    }

    public function destroy($id)
    {
        $content = $this->content->findOrFail($id);

        $content->delete();

        return redirect(route('backend.content.index'))->with('status', 'Content has been deleted');
    }

    public function upload(Requests\StoreGalleryRequest $request)
    {
        if($request->hasFile('path')){
            $filename = $request->file('path')->getClientOriginalName();
            $file = $request->file('path')->getClientOriginalExtension();
            $path = 'public/images/featured/';
            $request->file('path')->move($path, $filename);

            $attr['path'] = $this->path.''.$filename;

            if($this->gallery->create($attr)){
                return Response::json(array(
                    'success' => true),
                    200
                );
            }
        }
    }

    public function gallery(Request $request)
    {
        $result = $this->gallery
                ->offset($request->input('offset'))
                ->limit($request->input('limit'))
                ->orderBy('created_at', 'desc')
                ->get();
        $count = $this->gallery->count();
        return array(
                'total' => $count,
                'result' => $result
            );


        // return $request->input('limit');
    }
}
