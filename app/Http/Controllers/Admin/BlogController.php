<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'author' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Slug
        $data['slug'] = Str::slug($request->title);

        // Image Upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/blogs'), $filename);
            $data['image'] = $filename;
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog created successfully.');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'author' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(public_path('uploads/blogs/' . $blog->image))) {
                unlink(public_path('uploads/blogs/' . $blog->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/blogs'), $filename);
            $data['image'] = $filename;
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image && file_exists(public_path('uploads/blogs/' . $blog->image))) {
            unlink(public_path('uploads/blogs/' . $blog->image));
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog deleted successfully.');
    }
}
