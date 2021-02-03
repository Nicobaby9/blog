<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\{Post, Category, Tag};

class BlogController extends Controller
{
    public function index(Post $post) {
    	$posts = $post->orderBy('created_at', 'desc')->get();

    	return view('frontend.index', compact('posts'));
    }
}
