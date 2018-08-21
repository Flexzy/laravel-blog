<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostsController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        //$posts = Post::all();
        //$posts = Post::orderBy('id', 'desc')->get();
        $posts = Post::orderBy('id', 'desc')->paginate(3);
        //$posts = Post::orderBy('id', 'desc')->take(1)->get();
        //$posts = Post::where('id', '2')->get();
        //$posts = DB::select('SELECT * FROM posts');
        return view('posts.index')->with('posts', $posts);
    }

    
    public function create()
    {
        return view('posts.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body'  => 'required',
        ]);

        $post = new Post;
        $post->title = $request->input('title');
        $post->body  = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success', 'Post successfully created');

    }

    
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    
    public function edit($id)
    {
        $post = Post::find($id);

        if($post == null) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        if(auth()->user()->id != $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('posts.edit')->with('post', $post);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body'  => 'required',
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body  = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Post successfully updated');
    }

    
    public function destroy($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id != $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        $post->delete();
        return redirect('/posts')->with('success', 'Post successfully removed');
    }
}
