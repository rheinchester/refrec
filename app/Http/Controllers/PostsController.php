<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use  App\Http\Resources\PostResource;
class PostsController extends Controller
{


        /**
     * 
     * List all posts;
     */
    public function list()
    {
        $posts = auth()->user()->posts()->orderBy('id', 'desc')->paginate(10);

        if (!$posts->first()) {
            return response()->json(['message' => 'No more post to return'], 404);
        }

        return PostResource::collection(resource: $posts);
    }

    /**
     * 
     * Creare new post
     */
    public function create()
    {
        $this->validate(request: \request(), rules: ['content' => 'required']);
        $post = new Post( attributes: [
            'content' => \request(key: 'content')
        ]
    );
        // auth()->user()->posts()->save($post);
        auth()->user()->posts()->save($post);

        // return response()->json($post);
        return new PostResource(resource: $post);
    }
}
 