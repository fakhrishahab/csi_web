<?php

namespace csi\Http\Controllers\Backend;

use csi\Post;
use csi\User;

class DashboardController extends Controller
{

	public function index(Post $posts, User $users)
	{
		$posts = $posts->orderBy('updated_at', 'desc')->take(5)->get();
		$users = $users->whereNotNull('updated_at')->orderBy('updated_at', 'desc')->take(5)->get();

		return view('backend.dashboard', compact('posts', 'users'));
	}

}