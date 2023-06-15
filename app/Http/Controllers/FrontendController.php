<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
        {
            $categories = Category::all();
            $posts = Post::published()->paginate(4);
            $tags = Tag::all();
            $data = compact('posts','categories','tags');
            return view("frontend.index")->with($data);
        }
    
    public function category()
        {
            
        } 
        
    public function contact()
        {
            return view("frontend.contact");
        }    
    public function showPost($id)
        {
            $posts = Post::published()->where("category_id",$id)->paginate(4);
            $categories = Category::all();
            $tags = Tag::all();
            $category = new Category;
            $category_name = $category->find($id);
            $data = compact('posts','categories','tags','category_name');
            return view("frontend.index")->with($data);    
        }
    public function showPostByTag($id)
        {
            $posts = Post::published()->leftJoin("post_tag",'post_tag.post_id','=','posts.id')->where('post_tag.tag_id',$id)->paginate(4);
            $categories = Category::all();
            $tags = Tag::all();
            $tag = new Tag;
            $tag_name = $tag->find($id);
            $data = compact('posts','categories','tags','tag_name');
            return view("frontend.index")->with($data);    
        }        
    public function postDetail(Post $post)
        {
            $categories = Category::all();
            $tags = Tag::all();
            $data = compact('post','categories','tags');
            return view("frontend.post-detail")->with($data);
        }  
    
    public function search(Request $request)
        {
            $search_text = $request->search_text;
            $categories = Category::all();
            $tags = Tag::all();
            $posts = Post::published()->where('title','like','%'.$search_text.'%')->paginate(4);
            $data = compact('posts','categories','tags','search_text');
            return view("frontend.search")->with($data);
        }    
}
