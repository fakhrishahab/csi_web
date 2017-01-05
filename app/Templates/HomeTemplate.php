<?php

namespace csi\Templates;

use Carbon\Carbon;
use csi\Post;
use csi\Content;
use csi\Pages;
use csi\Info;
use Illuminate\View\View;

class HomeTemplate extends AbstractTemplate
{

	protected $view = 'home';

	protected $posts, $contents, $pages, $infos;

	public function __construct(Post $posts, Content $contents, Pages $pages, Info $info)
	{
		$this->posts = $posts;
		$this->contents = $contents;
		$this->pages = $pages;
		$this->infos = $info;
	}

	public function prepare(View $view, array $parameters)
	{
		$posts = $this->posts->with('author')
								->where('published_at', '<', Carbon::now())
								->orderBy('published_at', 'desc')
								->take(3)
								->get();


		$home = $this->contents->where('page_id', 6)->get();	

		$about_page = $this->pages->where('id', 9)->get();
		$about = $this->contents->where('page_id', 9)->get();

		$service = $this->contents->where('page_id', 11)->get();
		$service_page = $this->pages->where('id',11)->orderBy('updated_at', 'DESC')->get();

		$keypeople = $this->contents->where('page_id', 10)->get();

		$testimoni_page = $this->pages->where('id', 12)->get();
		$testimoni = $this->contents->where('page_id', 12)->get();

		$client_page = $this->pages->where('id', 13)->get();
		$client = $this->contents->where('page_id', 13)->orderBy('updated_at', 'DESC')->get();

		$info = $this->infos->all();
		// $data = array(
		// 	'post' => $post,
		// 	'page' => 'ABOUT'
		// );

		$view->with('posts', $posts)
			->with('home', $home)
			->with('service_page', $service_page)
			->with('service', $service)
			->with('about_page', $about_page)
			->with('about', $about)
			->with('keypeople', $keypeople)
			->with('testimoni_page', $testimoni_page)
			->with('testimoni', $testimoni)
			->with('client_page', $client_page)
			->with('client', $client)
			->with('info', $info);
	}

}