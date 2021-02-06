<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\{Post, Category, Tag, WebSetting};
use Str;
use View;

class BlogController extends Controller
{
	public function __construct() {
		$categories = Category::take(5)->get();
    	$navCategories = Category::latest()->take(3)->get();
        $web = WebSetting::all()->first();
        $tags = Tag::orderBy('name', 'asc')->take(10)->get();

    	View::share('categories', $categories);
    	View::share('navCategories', $navCategories);
    	View::share('tags', $tags);
    	View::share('web', $web);
	}

    public function index(Post $post) {
    	$main_post = Post::where('main_content', 1)->latest()->first();
    	$second_main_post = Post::whereNotIn('id', array($main_post->id))->where('main_content', 1)->take(2)->get();
    	$recent_post = $post->whereNotIn('id', array($main_post->id))->latest()->take(6)->get();
    	$all_posts = Post::paginate(5);

    	return view('frontend.index', compact('recent_post', 'all_posts', 'main_post', 'second_main_post'));
    }

    public function show($post) {
    	$post = Post::where('slug', $post)->first();
    	$count = $post->view_count += 1;
    	$post->update([
    		'view_count' => $count,
    	]);

    	return view('frontend.show', compact('post'));
    }

    public function category(Category $category) {
    	$posts = Post::latest()->paginate(5);
    	$posts = $category->posts()->paginate(5);

    	return view('frontend.category-show', compact('posts', 'category'));
    }

    public function listCategory() {
    	$all_categories = Category::all();

    	return view('frontend.list-category', compact('all_categories'));
    }

    public function search(Request $request) {
    	$posts = Post::where('title', $request->search)->orWhere('title', 'like', '%'.$request->search.'%')->paginate(5);
    	// $posts = $category->posts()->paginate(5);

    	return view('frontend.category-show', compact('posts', 'category'));
    }
}
