<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Mail\NewPostNotificationMail;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        if (isset($params['orderBy']))
            $posts = Post::orderBy($params['orderBy'], $params['dir'])->get();
        else
            $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $tags = Tag::orderBy('name', 'asc')->get();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $params = $request->validate([
            'title' => 'required|max:255|min:5',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
            'image' => 'nullable|image|max:2048',
        ]);

        // dd($params['image']);
        $params['slug'] = Post::getUniqueSlugFromTitle($params['title']);

        if (array_key_exists('image', $params)) {
            $img_path = Storage::disk('images')->put('post_covers', $request->file('image'));
            $params['cover'] = $img_path;
        }

        $post = Post::create($params);

        if (array_key_exists('tags', $params)) {
            $tags = $params['tags'];
            $post->tags()->sync($tags);
        }

        Mail::to('account@mail.com')->send(new NewPostNotificationMail($post));

        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $tags = Tag::orderBy('name', 'asc')->get();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $old_cover = $post->cover;
        // dd($old_cover);

        // dd($request->all());
        $params = $request->validate([
            'title' => 'required|max:255|distinct',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($params['title'] !== $post->title) {
            $params['slug'] = Post::getUniqueSlugFromTitle($params['title']);
        }

        if (array_key_exists('image', $params)) {
            $img_path = Storage::disk('images')->put('post_covers', $request->file('image'));
            $params['cover'] = $img_path;
        }

        $post->update($params);

        // dd($old_cover);
        if (array_key_exists('image', $params)) {
            if ($old_cover && Storage::disk('images')->exists($old_cover)) {
                Storage::disk('images')->delete($old_cover);
            }
        }

        if (array_key_exists('tags', $params)) {
            $post->tags()->sync($params['tags']);
        } else {
            $post->tags()->detach();
        }

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Request $request)
    {
        $cover = $post->cover;
        // $cover_exist = explode('/', $cover);
        // $cover_name = $cover_exist[2];
        // dd($cover_name);

        $request = ['orderBy' => $request['orderBy'], 'dir' => $request['dir']];
        $post->delete();

        if ($cover && Storage::disk('images')->exists($cover)) {
            // dd('sono qui');
            Storage::disk('images')->delete($cover);
        }

        return redirect()->route('admin.posts.index', $request);
    }
}
