<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function singlepost(Request $request){
        if(!request()->post_id){
            return abort(404);
        }else{
            $post=Post::find(request()->post_id);
            $data=[
                'post'=>$post,
                'title'=>'Edit Post',
            ];
            return view('front.pages.single-blog',$data);
        }
    }
}
