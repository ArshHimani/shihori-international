<?php

namespace App\Http\Controllers;

use App\Models\Certificate;

use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function certificate_display(Request $request){
        $certificates = Certificate::all();
        return view('certificate',compact('certificates'));
    }

    public function certificate_list(){
        $certificates = Certificate::all();
        return view('admin.certificate-list',compact('certificates'));
    }

    public function certificate_add_show(){
        return view('admin.certificate-add');
    }

    public function certificate_add(Request $request){
        $request->validate([
            'certificate_name' => 'required|string|max:255|unique:certificates,certificate_name',
            'certificate_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        try {
            // Handle file upload
            if ($request->hasFile('certificate_image')) {
                $originalName = $request->file('certificate_image')->getClientOriginalName();
                $request->file('certificate_image')->move(public_path('images/certificates'), $originalName);
    
                // Save certificate data to the database
                Certificate::create([
                    'certificate_name' => $request->input('certificate_name'),
                    'certificate_image' => 'images/certificates/' . $originalName,
                ]);
    
                // Return a success JSON response
                return response()->json(['success' => true, 'message' => 'Certificate added successfully!']);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to upload certificate image.']);
            }
        } catch (\Exception $e) {
            // Handle errors
            return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function certificate_delete($id){
        $certificate = Certificate::find($id);

        if($certificate){
            $certificate->delete();
            return redirect()->route('certificate.list');
        }
    }

    public function certificate_update(Request $request,$id){
        $request->validate([
            'certificate_name' => 'required|string|max:255',
            'certificate_image' => 'nullable|image|max:2048',
        ]);

        $certificate = Certificate::find($id);

        $existingCertificate = Certificate::where('certificate_name', $request->input('certificate_name'))
        ->where('id', '!=', $certificate->id)
        ->first();

        if($existingCertificate){
            return response()->json(['success' => false, 'message' => 'Certificate already exist.']);
        } else{
            if($request->hasFile('certificate_image')){
                $originalName = $request->file('certificate_image')->getClientOriginalName();

                $imagePath = $request->file('certificate_image')->move('images/certificates', $originalName, 'public');
            } else {
                // If no new image, keep the existing one
                $imagePath = $certificate->certificate_image;
            }

            $certificate->update([
                'certificate_name' => $request->input('certificate_name'),
                'certificate_image' => $imagePath,
            ]);
            
            return response()->json(['success' => true, 'message' => 'Certificate Updated Successfully.']);
        }
    }
}