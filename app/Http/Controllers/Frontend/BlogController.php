<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\{Post, Category, Tag};
use Str;

class BlogController extends Controller
{
    public function index(Post $post) {
    	$recent_post = $post->orderBy('created_at', 'desc')->get();
    	$posts = $post->orderBy('created_at', 'asc')->paginate(3);

    	return view('frontend.index', compact('recent_post', 'posts'));
    }

    public function show($post) {
    	$post = Post::where('slug', $post)->first();
    	$str_modif = Str::words($post->content, 10, '...');
    	// dd($str_modif);

    	return view('frontend.show', compact('post', 'str_modif'));
    }
}
