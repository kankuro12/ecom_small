<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('back.blog.index')->with(compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->publish = $request->publish;
        $blog->desc = $request->desc;
        $blog->tag = $request->tag;
        $blog->post_by = $request->post_by;

        if($request->has('image')){
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('back/images/blog'), $imageName);
            $blog->image = $imageName;
            }
        $blog->save();
        return redirect()->back()->with('success','New blog has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::where('id',$id)->first();
        return view('back.blog.edit')->with(compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::where('id',$id)->first();
        $blog->title = $request->title;
        $blog->publish = $request->publish;
        $blog->desc = $request->desc;
        $blog->tag = $request->tag;
        $blog->post_by = $request->post_by;

        if($request->has('image')){
            unlink(public_path('back/images/blog/'.$blog->image));
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('back/images/blog'), $imageName);
            $blog->image = $imageName;
            }
        $blog->save();
        return redirect()->back()->with('success','Blog has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::where('id',$id)->first();
        $blog->delete();
        unlink(public_path('back/images/blog/'.$blog->image));
        return redirect()->back()->with('success','Blog has been deleted successfully!');
    }
}
