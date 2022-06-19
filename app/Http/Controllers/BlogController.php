<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function guestpost($slug)
    {
        $ulogovaniuser = Auth::user();
        $post = Post::findBySlugOrFail($slug);
        return view('post.show', compact('post', 'ulogovaniuser'));
    }
    public function home()
    {
        return view('home');
    }
    public function index()
    {

        $ulogovaniuser = Auth::user();
        $posts = Post::paginate(4);
        return view('blog.index', compact('posts', 'ulogovaniuser'));
    }
    public function profil($slug)
    {
        $ulogovaniuser = Auth::user();
        $user = User::findBySlugOrFail($slug);
        return view('nalog.profil', compact('user', 'ulogovaniuser'));
    }
    public function profiledit()
    {
        $ulogovaniuser = Auth::user();
        $user = Auth::user();
        return view('nalog.edit', compact('user', 'ulogovaniuser'));
    }
    public function profilupdate(Request $request)
    {
        $ulogovaniuser = Auth::user();
        $user = Auth::user();
        $input = $request->all();
        if ($request->picture) {
            if ($user->picture) {

                File::delete(public_path('\images\profil\\') . $user->picture);
                // unlink(public_path('\images\profil\\') . $user->picture);
            }
            $file = $request->picture;
            $name = $file->getClientOriginalName();
            $file->move('images/profil', $name);
            $input['picture'] = $name;
        }
        $user->update($input);
        Session::flash('user-updated-message', 'Profil uspjesno uredjen!!');
        return redirect()->route('profil', $ulogovaniuser->slug);
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
        return "SHOW";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
