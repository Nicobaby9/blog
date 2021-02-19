<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\{AdviceMail, User, Post, WebSetting};
use View;

class DashboardController extends Controller
{
	public function __construct() {
        $web = WebSetting::all()->first();

    	View::share('web', $web);
	}

    public function index() {
    	if(auth()->user()->role == 99) {
	    	$authors = User::where('role', 1)->get();
	    	$users = User::where('role', 0)->get();
	    	$posts = Post::where('status', 1)->orWhere('status', 2)->get();
	    	$mails = AdviceMail::get();
	    	$all_post = Post::orderBy('created_at', 'desc')->take(6)->get();	
	    	$latest_user = User::where('role', 0)->latest()->take(4)->get();

    		return view('admin.dashboard', compact('all_post', 'authors', 'posts', 'users', 'mails', 'latest_user'));
    	}else if(auth()->user()->role == 1) {
	    	$all_post = Post::orderBy('created_at', 'desc')->take(6)->get();	

    		return view('admin.dashboard', compact('all_post'));
    	}

    }
}
