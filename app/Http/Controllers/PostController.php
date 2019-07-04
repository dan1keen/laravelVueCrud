<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostCollection;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request) {
        $post = new Post([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
        ]);

        $post->save();

        return response()->json('success');

    }

    public function index(){
        $posts = new PostCollection(Post::all());
        return $posts;
    }

    public function delete($id){
        $post = Post::find($id);
        $post->delete($id);
        return response()->json('successfully deleted');
    }
    public function single($id){
        $post = Post::find($id);
        return response()->json($post);
    }
    public function update(Request $request,$id){
        $post = Post::find($id);
        $post->update($request->all());
        return response()->json('successfully updated');
    }
}
