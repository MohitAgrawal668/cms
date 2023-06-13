<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
        {
            $this->middleware('categorycheck')->only('create','store');
        }

    public function index()
    {
        $posts = Post::all();
        $data = compact('posts');
        return view("post.index")->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $data = compact('categories','tags');
        return view("post.create")->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        $image = time()."-cms.".$request->file("image")->getClientOriginalExtension();
        $file = $request->file("image")->storeAs("uploads", $image,"public");
        $post = Post::create([
            "title" => $request->title,
            "description" => $request->description,
            "content" => $request->content,
            "image" => $image,
            "published_at" => $request->published_at,
            "category_id"  => $request->category
        ]);

        if($request->tag)
            {
                $post->tags()->attach($request->tag);
            }

        session()->flash("success","Post created successfully");

        return redirect(route("post.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $data = compact('post','categories','tags');
        return view("post.create")->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, POST $post)
    {
        if(!empty($request->file('image')))
            {
                $file = time()."-cms.".$request->file('image')->getClientOriginalExtension();
                $request->file("image")->storeAs("uploads", $file, "public");
                $post->update([
                    "image" => $file
                ]);
            }
        $post->update([
            "title" => $request->title,
            "description" => $request->description,
            "content" => $request->content,
            "published_at" => $request->published_at,
            "category_id" => $request->category
        ]);
        session()->flash("success", "Post updated successfully.");
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $post = Post::onlyTrashed()->find($id);
        $post->forceDelete();
        Storage::delete("public/uploads/".$post->image);
        session()->flash("success","Deleted successfully");
        return redirect(route("post.trashed"));
    }
    
    public function move_to_trash(Post $post)
        {
             $post->delete();
             session()->flash("success","successfully moved to trash");
             return redirect(route("post.index"));   
        }
    public function trashed()
        {
            $posts = Post::onlyTrashed()->get();
            $data = compact('posts');
            return view("post.trashed")->with($data);    
        }
        
    public function restore(string $id)
        {
            $post = Post::onlyTrashed()->find($id);
            $post->restore();
            session()->flash("success","This post restored successfully.");
            return redirect(route("post.trashed"));
        }    
}
