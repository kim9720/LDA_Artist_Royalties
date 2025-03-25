<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SongController extends Controller
{
    public function upload()
    {
        return view('songs.upload');
    }

    public function index()
    {
        return view('songs.index');
    }

    public function songStore(Request $request)
    {


        // dd($request->all());
        if ($request->hasFile('music')) {
            $path = $request->file('music')->store('public/music');
            $fileName = basename($path);

            return back()->with('success', "Music uploaded: $fileName");
        }

        return back()->with('error', 'No file selected');
    }
}
