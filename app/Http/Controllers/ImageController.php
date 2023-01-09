<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Intervention;

class ImageController extends Controller
{
    function upload_ajax(){
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $imageName = Str::uuid(). '.' . request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images/uploads'), $imageName);

        $new_w = request()->new_w ?? 360;
        $new_h = request()->new_h ?? 360;
        
        // ->fit($new_w, $new_h)
        Intervention::make(public_path('images') . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $imageName)->save();

        $image = new Image;
        $image->image = $imageName;

        $image->save();

        return compact('image');
    }
}
