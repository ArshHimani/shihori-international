<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productTypes = ProductType::all();  // Fetch all product types
        return view('index', compact('productTypes'));
    }

    public function productType_add_show(){
        return view('admin.productType-add');
    }

    public function productType_add(Request $request){
        $request->validate([
            'category_name' => 'required|string|max:255|unique:product_types,product_type_name',
            'category_description' => 'required|string|max:255',
            'category_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        
        
        if ($request->hasFile('category_image')) {
            $originalName = $request->file('category_image')->getClientOriginalName();

            // Optionally prepend a timestamp to avoid overwriting files with the same name
            $imageName = $originalName;

            // Move the image to the public directory
            $request->file('category_image')->move(public_path('images/category'), $imageName);
        }

        // Create a new product record
        ProductType::create([
            'product_type_name' => $request->input('category_name'),
            'product_type_description' => $request->input('category_description'),
            'product_type_image' => 'images/category/'.$imageName, // Store the image path
        ]);
        
        // return redirect()->back()->with('success', 'Product added successfully!');
        return response()->json(['success' => true, 'message' => 'Category added successfully!']);
    }

    public function productType_list(){
        $productTypes = ProductType::all();

        return view('admin.productType-list',compact('productTypes')); 
    }

    public function productType_update(Request $request,$id){
        $request->validate([
            'productType_name' => 'required|string|max:255',
            'productType_description' => 'required|string',
            'productType_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $productType = ProductType::find($id); 

        $existingProduct = ProductType::where('product_type_name', $request->input('productType_name'))
                                ->where('id', '!=', $productType->id)
                                ->first();

        if($existingProduct){
            return response()->json(['success' => false, 'message' => 'ProductType already exist.']);
        } else{
            if ($request->hasFile('productType_image')) {
                // Get the original file name
                $originalName = $request->file('productType_image')->getClientOriginalName();
                
                // Store the file with the original name in the 'images/spices' folder
                $imagePath = $request->file('productType_image')->move('images/category', $originalName, 'public');
            } else {
                    // If no new image, keep the existing one
                    $imagePath = $productType->product_type_image;
                }

            // Update the product data
                $productType->update([
                    'product_type_name' => $request->input('productType_name'),
                    'product_type_description' => $request->input('productType_description'),
                    'product_type_image' => $imagePath,
                ]);
            
                // Redirect with success message
                return response()->json(['success' => true, 'message' => 'Product updated successfully!']);
        }
    }

    public function productType_delete($id){
        $productType = ProductType::find($id);

        if($productType){
            $productType->delete();
            return redirect()->route('productType.list');
        }
    }
}

