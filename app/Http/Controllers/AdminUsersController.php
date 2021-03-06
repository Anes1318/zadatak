<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $ulogovaniuser = Auth::user();
        $users = User::all();
        return view('admin.users.index', compact('ulogovaniuser', 'users'));
    }
    public function uklonisliku($slug)
    {
        $user = User::findBySlugOrFail($slug);
        $user->picture = null;
        // return $user;
        $user->save();
        return back();
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
    public function destroy($slug)
    {
        $user = User::findBySlugOrFail($slug);
        
        $posts = $user->posts->all();
        foreach ($posts as $post) {
            if ($post->picture) {

                File::delete(public_path('\images\\') . $post->picture);
                // unlink(public_path('\images\\') . $post->picture);
            }
            $post->delete();
        }
        if ($user->picture) {
            File::delete(public_path('\images\profil\\') . $user->picture);
        }
        $user->delete();
        Session::flash('user-deleted-message', 'Korisnik uspjesno izbrisan!');
        return back();
    }
}
