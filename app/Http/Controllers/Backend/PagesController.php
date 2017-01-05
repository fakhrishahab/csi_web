<?php

namespace csi\Http\Controllers\Backend;

use csi\Page;
use Illuminate\Http\Request;

use csi\Http\Requests;
use Baum\MoveNotPossibleException;

class PagesController extends Controller
{
    protected $pages;

    public function __construct(Page $pages, Request $req)
    {
    	$this->pages = $pages;
        $this->req = $req;
        $this->path = 'public/images/featured/';

    	parent::__construct();
    }

    public function index()
    {
    	$pages = $this->pages->all();

    	return view('backend.pages.index', compact('pages'));
    }

    public function create(Page $page)
    {
        $templates = $this->getPageTemplates();
        $orderPages = $this->pages->where('hidden', false)->orderBy('lft', 'asc')->get();

        return view('backend.pages.form', compact('page', 'templates', 'orderPages'));
    }

    public function store(Requests\StorePageRequest $request)
    {

        if($request->hasFile('image')){
            echo preg_replace('/\s+/', '', $request->file('image')->getClientOriginalName());
            // break;
            $filename = preg_replace('/\s+/', '', $request->file('image')->getClientOriginalName());
            $file = $request->only('uri')['uri'] . '_.'. $request->file('image')->getClientOriginalExtension();
            $path = 'public/images/featured/';
            $request->file('image')->move($path, $filename);
        }
        

        // $page = $this->pages->create($request->only('title', 'uri', 'name', 'content', 'template', 'hidden'));
        // echo $request->only('hidden')['hidden'] ? 'ada' : 'ga ada';
        $page = $this->pages->create([
            'title' => $request->only('title')['title'],
            'uri' => $request->only('uri')['uri'],
            'name' => $request->only('name')['name'],
            'content' => $request->only('content')['content'],
            'template' => $request->only('template')['template'],
            'hidden' => $request->only('hidden')['hidden'] ? $request->only('hidden')['hidden'] : 0,
            'image' => $request->hasFile('image') ? $this->path .''. $filename : '',
            'type' => $request->only('type')['type'] ? $request->only('type')['type'] : 0
            ]);

        $this->updatePageOrder($page, $request);

        return redirect(route('backend.pages.index'))->with('status', 'Page has been created');
    }

    public function confirm($id)
    {
        $page = $this->pages->findOrFail($id);

        return view('backend.pages.confirm', compact('page'));
    }

    public function destroy($id)
    {
    	$page = $this->pages->findOrFail($id);

        foreach($page->children as $child){
            $child->makeRoot();
        }

        $page->delete();

        return redirect(route('backend.pages.index'))->with('status', 'Page has been deleted');
    }

    public function edit($id)
    {
        $templates = $this->getPageTemplates();
        $page = $this->pages->findOrFail($id);
        $orderPages = $this->pages->where('hidden', false)->orderBy('lft', 'asc')->get();

        return view('backend.pages.form', compact('page', 'templates', 'orderPages'));
    }

    public function update(Requests\UpdatePageRequest $request, $id)
    {
        // print_r($request->only('content'));
        // break;
        $page = $this->pages->findOrFail($id);

        if($response = $this->updatePageOrder($page, $request)){
            return $response;
        }

        $attr = [
            'title' => $request->only('title')['title'],
            'uri' => $request->only('uri')['uri'],
            'name' => $request->only('name')['name'],
            'content' => $request->only('content')['content'],
            'template' => $request->only('template')['template'],
            'hidden' => $request->only('hidden')['hidden'],
            'type' => $request->only('type')['type'] ? $request->only('type')['type'] : 0
        ];

        if($request->hasFile('image')){
            $filename = preg_replace('/\s+/', '', $request->file('image')->getClientOriginalName());
            $file = $request->only('uri')['uri'] . '_.'. $request->file('image')->getClientOriginalExtension();
            $path = 'public/images/featured/';
            $request->file('image')->move($path, $filename);

            $attr['image'] = $this->path.''.$filename;
            // array_push($attr, 'image' => $this->path.''.$filename);
        }

        // $page->fill($request->only('title', 'uri','name', 'content', 'template', 'hidden'))->save();
        $page->fill($attr)->save();

        return redirect(route('backend.pages.edit', $page->id))->with('status', 'Page has been updated');
    }

    protected function getPageTemplates()
    {
        $templates = config('cms.templates');

        return ['' => ''] + array_combine(array_keys($templates), array_keys($templates));
    }

    protected function updatePageOrder(Page $page, Request $request)
    {
        if($request->has('order', 'orderPage')){
            try{
                $page->updateOrder($request->input('order'), $request->input('orderPage'));
            }catch(MoveNotPossibleException $e){
                return redirect(route('backend.pages.edit', $page->id))->withInput()->withErrors([
                    'error' => 'Cannot make a page a child of itself'
                ]);
            }
        }
    }

    
}
