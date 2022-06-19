<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() {
        $images = Image::all();


        return view('test', compact('images'));
    }

    public function store(Request $request) {
//        $validation = $request->validate([
//            'name' => 'required',
//            'img' => 'required'
//        ]);
//
//        $path = $request->file('img')->store('upload', 'public');
//        Image::create([
//            'name' => $request->input('name'),
//            'img' => $path,
//        ]);
//        return response()->json('ok', 200);
    }
}
