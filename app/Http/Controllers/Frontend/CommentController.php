<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\{Comment, Post};

class CommentController extends Controller
{
	function __construct() {
        return $this->middleware('auth');
    }

    public function commentStore(Request $request) {
    	$this->validate($request, [
    		'comment_body' => 'required'
    	]);

    	$comment = new Comment;
    	$comment->body = $request->get('comment_body');
    	$comment->user()->associate($request->user());
    	$post = Post::find($request->get('post_id'));
    	$post->comments()->save($comment);

    	return redirect()->back()->with(['success' => 'Berhasil menambahkan comment']);
    }

    public function replyStore(Request $request)
    {
    	$this->validate($request, [
    		'comment_body' => 'required'
    	]);
    	
        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);

    	return redirect()->back()->with(['success' => 'Berhasil menambahkan comment']);
    }
}
