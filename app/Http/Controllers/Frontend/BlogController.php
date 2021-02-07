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
        $popular_post = Post::orderBy('view_count', 'desc')->take(4)->get();
        // $cat = Category::where('')

    	View::share('categories', $categories);
    	View::share('navCategories', $navCategories);
    	View::share('popular_post', $popular_post);
    	View::share('tags', $tags);
    	View::share('web', $web);
	}

    public function index(Post $post) {
    	$main_post = Post::where('main_content', 1)->latest()->first();
    	$second_main_post = Post::whereNotIn('id', array($main_post->id))->where('main_content', 1)->take(2)->get();
    	$recent_post = $post->whereNotIn('id', array($main_post->id))->latest()->take(6)->get();
    	$all_posts = Post::paginate(5);

    	return view('frontend.post.index', compact('recent_post', 'all_posts', 'main_post', 'second_main_post'));
    }

    public function show($post) {
    	$post = Post::where('slug', $post)->first();
    	$related_post = Post::where('category_id', $post->category_id)->take(3)->get();

    	$count = $post->view_count += 1;
    	$post->update([
    		'view_count' => $count,
    	]);

    	return view('frontend.post.show', compact('post', 'related_post'));
    }

    public function category(Category $category) {
    	$posts = Post::latest()->paginate(5);
    	$posts = $category->posts()->paginate(5);

    	return view('frontend.post.category-show', compact('posts', 'category'));
    }

    public function tag($tag) {
    	$tag = Tag::where('slug', $tag)->first();
        $posts = Post::orderBy('created_at', 'asc')->take(6)->get();

        $posts = $tag->posts;

    	return view('frontend.post.tag-show', compact('posts', 'tag'));
    }

    public function listCategory() {
    	$all_categories = Category::all();

    	return view('frontend.list-category', compact('all_categories'));
    }

    public function search(Request $request) {
    	$posts = Post::where('title', $request->search)->orWhere('title', 'like', '%'.$request->search.'%')->paginate(5);
    	// $posts = $category->posts()->paginate(5);

    	return view('frontend.post.category-show', compact('posts', 'category'));
    }

    //COMPANY
    public function about() {
        return view('frontend.about');
    }
}
