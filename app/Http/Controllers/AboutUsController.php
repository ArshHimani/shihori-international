<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function aboutUs(Request $request){
        $aboutUs = AboutUs::all();
        return view('admin.aboutUs-update',compact('aboutUs'));
    }

    public function aboutUs_update(Request $request) {
        try {
            // Validate the input
            $request->validate([
                'para1' => 'required|string',
                'para2' => 'required|string',
                'feature1_title' => 'required|string',
                'feature1' => 'required|string',
                'feature2_title' => 'required|string',
                'feature2' => 'required|string',
                'feature3_title' => 'required|string',
                'feature3' => 'required|string',
            ]);
    
            // Perform the update
            AboutUs::where('id', $request->input('aboutUs_id'))->update([
                'para1' => $request->input('para1'),
                'para2' => $request->input('para2'),
                'feature1_title' => $request->input('feature1_title'),
                'feature1' => $request->input('feature1'),
                'feature2_title' => $request->input('feature2_title'),
                'feature2' => $request->input('feature2'),
                'feature3_title' => $request->input('feature3_title'),
                'feature3' => $request->input('feature3'),
            ]);
            
            // Return success response as JSON
            return response()->json(['success' => true, 'message' => 'Updated Successfully']);
    
        } catch (\Exception $e) {
            // Log the error and return a JSON error response
            \Log::error('Error updating About Us: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function aboutUs_display(){
        $aboutUs = AboutUs::all();
        return view('about',compact('aboutUs'));
    }
    
}
