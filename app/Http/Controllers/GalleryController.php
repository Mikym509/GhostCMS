<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gallery;

class GalleryController extends Controller
{
    function gallery()
    {
        $images = Gallery::all();
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('blog.galleryView', ['images' => $images])->with($data);
    }

    function addImageviews()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('blog.addImage')->with($data);
    }

    function upload(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('/images/uploadImages'), $newImageName);

        $user_id = $request->input('user_id');

        Gallery::create([
            'title' => $request->input('title'),
            'image_path' => $newImageName,
            'user_id' => $user_id,
        ]);

        return redirect('/gallery');
    }

    /**
     * remove the post from the database
     * @param string $title
     * @return \Illuminate\Http\Response
     */

    public function delete($title)
    {
        $post = Gallery::where('title', $title);
        $post->delete();

        return back();
    }
}