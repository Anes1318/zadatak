<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ulogovaniuser = Auth::user();

        $posts = Post::all();
        return view('post.index', compact('posts', 'ulogovaniuser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $ulogovaniuser = Auth::user();
        return view('post.create', compact('ulogovaniuser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $posts = Post::paginate(4);
        $user = Auth::user();
        // return $user;
        $input = $request->all();

        $input['user_id'] = $user->id;

        $file = $request->picture;
        
        $name = time(). $file->getClientOriginalName();
        $file->move('images', $name);
        $input['picture'] = $name;
        Post::create($input);

        Session::flash('post-created-message', 'Post uspjesno napravljen!');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        
        $ulogovaniuser = Auth::user();
        $post = Post::findBySlugOrFail($slug);
        return view('post.show', compact('post', 'ulogovaniuser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $ulogovaniuser = Auth::user();
        $post = Post::findBySlugOrFail($slug);
        return view('post.edit', compact('post', 'ulogovaniuser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $ulogovaniuser = Auth::user();
        $post = Post::findBySlugOrFail($slug);
        $input = $request->all();
        if ($request->picture) {
            if ($post->picture) {
                File::delete(public_path('\images\\') . $post->picture);
                // unlink(public_path('\images\\') . $post->picture);
            }
            $file = $request->picture;
            $name = time() .  $file->getClientOriginalName();
            $file->move('images', $name);
            $input['picture'] = $name;
        }

        $post->update($input);
        Session::flash('post-edited-message', 'Post uspjesno uredjen!');

        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        
        if ($post->picture) {
            File::delete(public_path('\images\\') . $post->picture);
            // unlink(public_path('\images\\') . $post->picture);
        }
        $post->delete();
        Session::flash('post-deleted-message', 'Post uspjesno izbrisan!');
        return back();
    }
}
