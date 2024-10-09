<?php

namespace App\Http\Controllers;

use App\Models\{Blog, Category};
use Illuminate\Http\Request;
use Session;
use File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blog.index', [
            'blogs'=>Blog::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create', [
            'categories'=>Category::get(['id','name'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'publish_date'=>'required',
            'title'=>'required',
            'slug'=>'required',
            'meta_description'=>'required',
        ]);
        $blog = new Blog();
        if ($request->hasFile('blog_photo')) {
            $request->validate([
                'blog_photo'=>'image'
            ]);
            $fileName = time().'_'. $request->blog_photo->getClientOriginalName();
            $filePath = $request->blog_photo->storeAs('public/blog_photo', $fileName);
            $blog->blog_photo = $fileName;
        }
        $blog->category_id = $request->category_id;
        $blog->publish_date = $request->publish_date;
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->meta_description = $request->meta_description;
        $blog->description = $request->description;
        $blog->published = $request->published;
        $blog->save();
        Session::flash('success_message','Blog Created Successfully!');
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('blog.show', [
            'blog'=>$blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', [
            'blog'=>$blog,
            'categories'=>Category::get(['id','name'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'category_id'=>'required',
            'publish_date'=>'required',
            'title'=>'required',
            'slug'=>'required',
            'meta_description'=>'required',
        ]);

        if ($request->hasFile('blog_photo')) {
            $request->validate([
                'blog_photo'=>'image'
            ]);
            if ($blog->blog_photo) {
                if (file_exists(public_path('storage/blog_photo/'.$blog->blog_photo))) {
                    File::delete(public_path('storage/blog_photo/'.$blog->blog_photo));
                }
            }
            $fileName = time().'_'. $request->blog_photo->getClientOriginalName();
            $filePath = $request->blog_photo->storeAs('public/blog_photo', $fileName);
            $blog->blog_photo = $fileName;
        }
        $blog->category_id = $request->category_id;
        $blog->publish_date = $request->publish_date;
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->meta_description = $request->meta_description;
        $blog->description = $request->description;
        $blog->published = $request->published;
        $blog->save();
        Session::flash('success_message','Blog Updated Successfully!');
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        Session::flash('success_message','Blog Soft-deleted Successfully!');
        return redirect()->route('blog.index');
    }

    public function BlogTrash() {
        return view('blog.trash', [
            'blogs' => Blog::onlyTrashed()->get()
        ]);
    }

    public function BlogRestore($id) {
        $blog = Blog::onlyTrashed()->findOrFail($id);
        $blog->restore();
        Session::flash('success_message','Blog Restored Successfully!');
        return redirect()->back();
    }

    public function BlogForceDelete($id) {
        $blog = Blog::onlyTrashed()->findOrFail($id);
        if ($blog->blog_photo) {
            if (file_exists(public_path('storage/blog_photo/'.$blog->blog_photo))) {
                File::delete(public_path('storage/blog_photo/'.$blog->blog_photo));
            }
        }
        $blog->forceDelete();
        Session::flash('success_message','Blog Permanent-Deleted Successfully!');
        return redirect()->back();
    }

    public function BlogRelated($cat_id) {
        return view('blog.related', [
            'blogs' => Category::findOrFail($cat_id)->blogs
        ]);
    }
}
