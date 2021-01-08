<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('client.home-client', compact('posts'));
    }

    public function show($id) {
        $post = Post::find($id);
        $comment = Comment::where('post_id', $id)->orderBy('created_at', 'desc')->get();
        return view('client.post-detail', compact('post', 'comment'));
    }

}
