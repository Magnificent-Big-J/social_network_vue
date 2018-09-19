<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;

class FeedsController extends Controller
{
    public function feed()
    {
        $friends = Auth::user()->friends();
        $feeds = array();
        foreach ($friends as $friend)
        {
            foreach ($friend->posts as $post) {
                array_push($feeds,$post);
            }
        }

        foreach (Auth::user()->posts as $post)
        {
            array_push($feeds,$post);
        }

        usort($feeds,function($p1,$p2){
            return $p1->id < $p2->id;
        });

        return $feeds;
    }
}
