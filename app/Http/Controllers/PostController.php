<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.posts.create', [
            'tags'          => Tag::all(),
            'categories'    => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

        //  $tags = explode(',', $request->tags);

        $post                   = new Post;
        $post->title            = $request->title;
        $post->slug             = Str::slug($request->title);
        $post->body             = $request->body;
        $post->author_id        = Auth::user()->id;
        $post->category_id      = $request->category_id;
        $post->published_at     = $request->published_at;
        $post->meta_description = $request->meta_description;

        if ($request->hasFile('cover_image')) {
            $image          = $request->file('cover_image');
            $imageName      = $image->getClientOriginalName();
            $imageNewName   = explode('.', $imageName)[0];
            $fileExtention  = time() . '.' . $imageNewName . '.' . $image->getClientOriginalExtension();
            $location       = storage_path('app/public/images/' . $fileExtention);
            Image::make($image)->resize(1200, 630)->save($location);

            $post->cover_image = $fileExtention;
        };

        $post->save();
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Post created succesfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $oldTags = $post->tags->pluck('id')->toArray();
        return view('dashboard.posts.edit', compact('post', 'tags', 'categories', 'oldTags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return view('dashboard.posts.index');
    }
}
