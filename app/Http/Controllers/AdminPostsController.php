<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $ulogovaniuser = Auth::user();
        $posts = Post::paginate(5);
        return view('admin.posts.index', compact('ulogovaniuser', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

   
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
  
        return view('admin.posts.edit', compact('post', 'ulogovaniuser'));
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
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $input['picture'] = $name;
        }

        $post->update($input);
        Session::flash('post-edited-message', 'Post uspjesno uredjen!');

        return back();
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
