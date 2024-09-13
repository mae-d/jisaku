<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageUploadController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function images()
    {
        $image = New Image;
        $images = $image->all();
        return view('images', ['images' => $images]);
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        $path = $image->store('public/images');
 
        $model = new Image;
        $model->path = $path;
        $model->save();
 
        return redirect()->route('images');
    }
}
