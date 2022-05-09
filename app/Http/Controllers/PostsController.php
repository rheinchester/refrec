<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Post;
class PostsController extends Controller
{
    public function create()
    {
        $this->validate(request: \request(), rules: ['content' => 'required']);
        $post = new Post( attributes: [
            'content' => \request(key: 'content')
        ]
    );
        auth()->user()->posts()->save($post);

        return response()->json($post);
    }
}
