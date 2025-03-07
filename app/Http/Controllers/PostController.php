<?php

namespace App\Http\Controllers;

use App\Model\Post;

use Illuminate\Http\Request;




class PostController extends Controller
{
    //  Post table 
    public function index()
    {
        $userId = auth()->user()->id;
        $page = Post::where('user_id', $userId)->paginate(1);

        $page2 = Post::paginate(1);

        return view('post', [
            "data" => $page,
            "data2" => $page2,
        ]);
    }

    //  delete Post 
    public function delete($id)
    {
        $Post = Post::findOrFail($id);
        
        $imageName = $Post->images;
        $imagePath = public_path('img/posts/' . $imageName);
        if (file_exists($imagePath)) {
            unlink($imagePath);  
        }

        $Post->delete();
        if (auth()->user()->role == 'admin') {
            return redirect()->route('post')->with("message", "deleted successfully");
        } else {
            return redirect()->route('post')->with("messageuser", "deleted successfully");
        }
    }


    //  create Post
    public function create($id)
    {
        $category_id = $id;
        return view("post/create", ["cate_id" => $category_id]);
    }
    //  create Post
    public function savenew(Request $request)
    {

        $request->validate([
            'content' => 'required',
            'image' => 'max:2048|mimes:png,jpeg',
        ]);

        if ($request->hasFile("image")) {
            $image = $request->image;
            $imageName = time() . rand(1, 100) . "." . $image->extension();
            $image->move(public_path("img/posts/"), $imageName);
        } else {
            $imageName = null;
        }

        Post::create([
            "content" => $request->content,
            "images" => $imageName,
            "user_id" => $request->user_id,
            "category_id" => $request->cate_id,
        ]);

        return redirect()->route("post")->with("messageuser", "created successfully");
    }


    //  update  Post
    public function edit($id)
    {
        $Post = Post::findOrFail($id);
        return view("Post/edit", ["result" => $Post]);
    }
    //  update Post
    public function saveedit(Request $request)
    {
        $old_id = $request->old_id;
        $Post = Post::findOrFail($old_id);

        $request->validate([
            'image' => 'max:2048|mimes:png,jpeg',
            'content' => 'required',
        ]);

        if ($request->hasFile("image")) {
            $image = $request->image;
            $imageName = time() . rand(1, 100) . "." . $image->extension();
            $image->move(public_path("img/Posts/"), $imageName);
        } else {
            $imageName = $Post->image;
        }

        $Post->update([
            "image" => $imageName,
            "content" => $request->content,
        ]);

        return redirect()->route("post")->with("messageuser", "updated successfully");
    }
}
