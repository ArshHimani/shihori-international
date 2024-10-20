<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function gallery(){
        $gallerys=  GalleryImage::all();

        return view('admin.gallery',compact('gallerys'));
    }

    public function gallery_add(Request $request){
        $request->validate([
            'gallery_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gallery_image')) {
            // Get the original file name
            $originalName = $request->file('gallery_image')->getClientOriginalName();
            
            // Store the file with the original name in the 'images/spices' folder
            $imagePath = $request->file('gallery_image')->move('images/gallery', $originalName, 'public');
        }

        
        GalleryImage::create([
            'gallery_image' => $imagePath,
        ]);
        
        // return redirect()->back();
            
        return response()->json(['success' => true, 'message' => 'Image Added successfully!']);
    }

    public function gallery_image_update(Request $request,$id){
        $request->validate([
            'gallery_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gallery = GalleryImage::find($id);

        if ($request->hasFile('gallery_image')) {
            // Get the original file name
            $originalName = $request->file('gallery_image')->getClientOriginalName();

            $imagePath = $request->file('gallery_image')->move('images/gallery', $originalName, 'public');
        } else {
                // If no new image, keep the existing one
                $imagePath = $gallery->gallery_image;
        }

        $gallery->update([
            'gallery_image' => $imagePath,
        ]);

        return response()->json(['success'=> true, 'message'=> 'Gallery Image Updated successfully.' ]);
    }

    public function gallery_image_delete($id){
        $gallery = GalleryImage::find($id);

        if($gallery){
            $gallery->delete();
            return redirect()->back();
        }
    }

    public function gallery_display(){
        $galleryImages = GalleryImage::all();

        return view('gallery-display',compact('galleryImages'));
    }
}
