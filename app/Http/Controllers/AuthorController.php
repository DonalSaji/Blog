<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index(Request $request){
        return view('back.pages.all-post');
    }

    public function signin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'name' => 'required',
            'phone' => 'required|max:10',
        ]);

        // Create new post
        $post = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
        ]);


        if ($post) {
            return redirect()->route('author.login');
        } else {
            return response()->json(['code' => 0, 'msg' => 'Failed to create user']);
        }
    }
    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('author.login');
    }

    public function createPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['code' => 0, 'msg' => 'Validation errors', 'errors' => $validator->errors()]);
        }

        // Handle file upload
        $imageName = null;
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        // Create new post
        $post = Post::create([
            'author_id' => Auth::id(), // Assuming author_id is the logged-in user's ID
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName,
        ]);

        if ($post) {
            return response()->json(['code' => 1, 'msg' => 'Post created successfully']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Failed to create post']);
        }
    }
    public function editpost(Request $request){
        if(!request()->post_id){
            return abort(404);
        }else{
            $post=Post::find(request()->post_id);
            $data=[
                'post'=>$post,
                'title'=>'Edit Post',
            ];
            return view('back.pages.edit-post',$data);
        }
    }
    public function updatepost(Request $request){
        if($request->hasFile('img')){
            $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255'.$request->post_id,
            'content' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
         
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            if($image){
                $old_image=Post::find($request->post_id)->image;
                if($old_image!=null && Storage::disk('public')->exists($post.$old_image)){
                    Storage::disk('public')->delete($path.$old_image);
                }
            $post=Post::find($request->post_id);
            $post->title=$request->title;
            $post->content=$request->content;
            $post->image=$imageName;
            $saved=$post->save();
            if($saved){
                return response()->json(['code'=>1,'msg'=>'Post image has been successfully updated']);
            }else{
                return response()->json(['code'=>3,'msg'=>'Something went wrong for updating post image']);
            }

            }else{
                return response()->json(['code'=>3,'msg'=>'Error in uplording new post image']);
            }

        }else{
            $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255'.$request->post_id,
            'content' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
            $post=Post::find($request->post_id);
            $post->title=$request->title;
            $post->content=$request->content;
            $saved=$post->save();
            if($saved){
                return response()->json(['code'=>1,'msg'=>'Post has been successfully updated']);
            }else{
                return response()->json(['code'=>3,'msg'=>'Something went wrong for updating post']);
            }
        }

    }
}
