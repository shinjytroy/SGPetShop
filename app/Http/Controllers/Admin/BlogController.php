<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();

        return view ("admin.blog.index", compact('blogs'));
        
    }
    public function create()
    {
        return view('admin.blog.create');
    }
    public function store(Request $request ) 
    {
        $request->validate([
            'title' => 'required|min:3|max:50',
            'sub_title' => 'required|min:3|max:50',           
            'description' => 'required|min:3|max:200',          
        ]); 
        $blogData = $request->all();
        Blog::create($blogData);
        return redirect()->route('admin.blog.index')->with('messagecreate','');
    }
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $blogData = $request->all(); 
        $blog->update($blogData);
        return redirect()->route('admin.blog.index')->with('messageupdate','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('messagedelete','');
    }

}

