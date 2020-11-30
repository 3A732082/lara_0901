<?php

namespace App\Http\Controllers;

use App\Models\Post;
use http\Env\Request;

class AdminPostsController extends Controller
{
    public function index()
    {
        $posts=Post::orderBy('created_at','DESC')->get();
        $data=['posts'=>$posts];
        return view('admin.posts.index',$data);
    }

    public function create()
    {
        return view('admin.posts.create');
    }
    public function store(\Illuminate\Http\Request $request)
    {
        Post::create($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function edit($id)
    {
        $posts=POST::find($id);
        $data = ['post'=>$posts];
        return view('admin.posts.edit', $data);
    }
    public function update(\Illuminate\Http\Request $request,$id)
    {
        $posts=POST::find($id);
        $posts->update($request->all());
        return redirect()->route('admin.posts.index');
    }
}
