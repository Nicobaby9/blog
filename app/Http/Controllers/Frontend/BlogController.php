<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\{Post, Category, Tag};
use Str;

class BlogController extends Controller
{
    public function index(Post $post) {
    	$main_post = Post::where('main_content', 1)->latest()->first();
    	$second_main_post = Post::whereNotIn('id', array($main_post->id))->where('main_content', 1)->take(2)->get();
    	$recent_post = $post->whereNotIn('id', array($main_post->id))->latest()->take(6)->get();
    	$all_posts = Post::paginate(5);

    	$categories = Category::take(5)->get();
    	$navCategories = Category::latest()->take(3)->get();

    	return view('frontend.index', compact('recent_post', 'all_posts', 'categories', 'navCategories', 'main_post', 'second_main_post'));
    }

    public function show($post) {
    	$post = Post::where('slug', $post)->first();
    	$categories = Category::take(5)->get();
    	$navCategories = Category::latest()->take(3)->get();

    	return view('frontend.show', compact('post', 'categories', 'navCategories'));
    }

    public function category(Category $category) {
    	$categories = Category::take(5)->get();
    	$navCategories = Category::latest()->take(3)->get();
    	$posts = Post::latest()->paginate(5);
    	$posts = $category->posts()->paginate(5);

    	return view('frontend.category-show', compact('categories', 'navCategories', 'posts', 'category'));
    }

    public function listCategory() {
    	$categories = Category::take(5)->get();
    	$navCategories = Category::latest()->take(3)->get();
    	$all_categories = Category::all();

    	return view('frontend.list-category', compact('categories', 'navCategories', 'all_categories'));
    }

    public function search(Request $request) {
    	$categories = Category::take(5)->get();
    	$navCategories = Category::latest()->take(3)->get();
    	$posts = Post::where('title', $request->search)->orWhere('title', 'like', '%'.$request->search.'%')->paginate(5);
    	// $posts = $category->posts()->paginate(5);

    	return view('frontend.category-show', compact('categories', 'navCategories', 'posts', 'category'));
    }
}
