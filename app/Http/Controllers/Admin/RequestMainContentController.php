<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\{Post, RequestMainContent, WebSetting};

class RequestMainContentController extends Controller
{
	public function __construct() {
        $web = WebSetting::all()->first();

        \View::share('web', $web);
    }

    public function index() {
    	$requestMainContents = RequestMainContent::where('status', 2)->orderBy('created_at', 'desc')->paginate(20);

    	return view('admin.request-main-content.index', compact('requestMainContents'));
    }

    public function updateMainContent(Request $request, $id) {
    	$post = Post::findOrFail($id);

        if ($request->main_content == 0) {
            return redirect()->back()->with(['error' => 'Anda sudah mengajukan request untuk post tersebut.']);
        }else if($request->main_content == 2) {
        	$post->main_content = 2;
        }

        $post->update();

    	$requestContent = RequestMainContent::create([
    		'user_id' => $post->user->id,
    		'post_id' => $post->id,
    		'status' => $request->main_content,
    	]);

    	return redirect()->back()->with(['success' => 'Request anda sedang diproses']);
    }

    public function detail($id) {
    	$requestMainContent = RequestMainContent::findOrFail($id);

    	return view('admin.request-main-content.detail', compact('requestMainContent'));
    }

    public function update(Request $request, $id) {
    	$requestMainContent = RequestMainContent::findOrFail($id);
        $posts = Post::where('main_content', 1)->get();

        if ($request->main_content == 1) {
            if($posts->count() >= 3) {
                return redirect()->back()->with(['error' => 'Main konten tidak dapat melebihi 3 konten.']);
            }else {
                $requestMainContent->post->main_content = 1;
                $requestMainContent->status = 1;
            }
        }

        $requestMainContent->post->update();
        $requestMainContent->delete();

        return redirect(route('request-main-content.index'))->with(['success' => 'Request Main Content sudah berhasil disetujui.']);
    }

    public function destroy($id) {
    	$requestMainContent = RequestMainContent::findOrFail($id);
    	$requestMainContent->post->main_content = 0;
    	$requestMainContent->post->update();
    	$requestMainContent->delete();

    	return redirect(route('request-main-content.index'))->with(['Berhasil menolak request.']);
    }
}
