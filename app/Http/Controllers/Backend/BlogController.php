<?php

namespace csi\Http\Controllers\Backend;

use csi\Post;
use Illuminate\Http\Request;

use csi\Http\Requests;

class BlogController extends Controller
{
    protected $posts;

    public function __construct(Post $posts)
    {
    	$this->posts = $posts;
    }

    public function index()
    {
    	$posts = $this->posts->with('author')->orderBy('published_at', 'desc')->paginate(10);

    	return view('backend.blog.index', compact('posts'));
    }

    public function create(Post $post)
    {
        return view('backend.blog.form', compact('post'));
    }

    public function store(Requests\StorePostRequest $request)
    {

    }



    public function confirm($id)
    {

    }

    public function desctroy($id)
    {

    }
}
