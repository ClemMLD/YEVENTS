<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function ImageUploadStore(Request $request)
    {
    	 $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('images'), $imageName);
  
        return back()
            ->with(200,'You have successfully upload image.')
            ->with('image',$imageName); 
    }

    // Get Image by his id
    public function getImage($id)
    {
        $image = Image::find($id);
        return response()->json($image);
    }
    
    // Delete Image
    public function deleteImage($id)
    {
        $image = Image::find($id);
        $image->delete();
        // Delete image from folder
        if(!unlink(public_path('images/'.$image->path))){
            return response()->json('Image cannot be deleted');
        }
        return response()->json('Image deleted!');
    }

}
