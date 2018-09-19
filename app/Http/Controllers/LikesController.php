<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Likes;
use App\Post;
use Illuminate\Support\Facades\Auth;
class LikesController extends Controller
{
    public function like($id)
    {
        $post = Post::find($id);

       $like = Likes::create([
            'user_id'=> Auth::id(),
            'post_id'=> $post->id
        ]);

       return Likes::find($like->id);
    }
    public function unlike($id)
    {
        $post = Post::find($id);

        $like = Likes::where('user_id',Auth::id())
            ->where('post_id',$post->id)
            ->first();

        $like->delete();

        return $like->id;
    }

}
