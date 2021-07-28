<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function index(){

        $posts = Post::paginate(2);

        return view('posts.index',[
            'posts' => $posts
        ]);
    }

    public function create(Request $request){
        
        $this->validate($request,[
           'body' => 'required'
        ]);

        // Post::create([
        //     'user_id' => auth()->id(),
        //     'body' => $request->body
        // ]);

        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        return back();

    }
}
