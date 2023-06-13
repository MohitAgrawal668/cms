<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tag\CreateTagRequest;
use App\Http\Requests\Tag\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        $data = compact('tags');
        return view("tag.index")->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tag.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTagRequest $request)
    {
        Tag::create([
            "name" => $request->name    
        ]);
        
        session()->flash("success","Tag created successfully");    

        return redirect(route('tag.index'));
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
    public function edit(Tag $tag)
    {
        $data = compact('tag');
        return view("tag.create")->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag -> update([
            "name" => $request->name
        ]);
        session()->flash("success","Tag updated successfully");
        return redirect(route('tag.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
         $tag->delete();
         session()->flash("success","This tag deleted successfully");
         return redirect(route('tag.index'));   
    }
}
