<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\WebSetting;
use View;

class DashboardController extends Controller
{
	public function __construct() {
        $web = WebSetting::all()->first();

    	View::share('web', $web);
	}

    public function index() {
    	return view('admin.dashboard');
    }
}
