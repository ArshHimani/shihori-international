<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function contactUs_display(){
        $contactUs = ContactUs::all();
        return view('contactUs-display',compact('contactUs'));
    }

    public function contactUs(){
        $contactUs = ContactUs::all();
        return view('admin.contactUs-update',compact('contactUs'));
    }

    public function contactUs_update(Request $request){
        try {
            // Validate the input
            $request->validate([
                'paragraph' => 'required|string',
                'phoneNo' => 'required|string|regex:/^[0-9]{10}$/',
                'email' => 'required|string|email',
                'address' => 'required|string',
                'opening_hours' => 'required|string',
                'whatsapp' => 'required|string',
                'facebook' => 'required|string',
                'instagram' => 'required|string',
                'linkedIn' => 'required|string',
            ]);
    
            // Perform the update
            ContactUs::where('id', $request->input('contactUs_id'))->update([
                'paragraph' => $request->input('paragraph'),
                'phoneNo' => $request->input('phoneNo'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'opening_hours' => $request->input('opening_hours'),
                'whatsapp' => $request->input('whatsapp'),
                'facebook' => $request->input('facebook'),
                'instagram' => $request->input('instagram'),
                'linkedIn' => $request->input('linkedIn'),
            ]);
            
            // Return success response as JSON
            return response()->json(['success' => true, 'message' => 'Updated Successfully']);
    
        } catch (\Exception $e) {
            // Log the error and return a JSON error response
            \Log::error('Error updating About Us: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
}
